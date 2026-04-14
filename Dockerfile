# =============================================================================
# Stage 1: Node — compile Vite frontend assets
# =============================================================================
FROM node:20-alpine AS node-build

WORKDIR /app

# Cache npm dependencies separately from source code
COPY package.json package-lock.json ./
RUN npm ci

# Copy source files needed by Vite (resources + config)
COPY vite.config.js ./
COPY resources/ ./resources/

RUN npm run build

# =============================================================================
# Stage 2: Composer — install PHP dependencies
# =============================================================================
# Use php:8.2-cli-alpine instead of composer:2 so that all required PHP
# extensions are available when Composer runs post-install scripts (e.g.
# package:discover) and builds the optimised autoloader.
FROM php:8.2-cli-alpine AS composer-build

# Install system libraries and PHP extensions that Laravel (and its packages)
# require at autoload-dump / post-install-cmd time.
RUN apk add --no-cache \
        curl \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        freetype-dev \
        libzip-dev \
        oniguruma-dev \
        icu-dev \
        unzip \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl

# Fetch the Composer binary from the official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy the full application source so that post-install scripts (e.g.
# artisan package:discover) can resolve service providers correctly.
COPY . .

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

# =============================================================================
# Stage 3: Runtime — PHP-FPM + nginx
# =============================================================================
FROM php:8.2-fpm-alpine AS runtime

# Install system dependencies and required PHP extensions
RUN apk add --no-cache \
        nginx \
        curl \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        freetype-dev \
        libzip-dev \
        oniguruma-dev \
        icu-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl \
    && rm -rf /var/cache/apk/*

WORKDIR /var/www/html

# Copy application source
COPY . .

# Copy compiled Vite assets from node-build stage
COPY --from=node-build /app/public/build ./public/build

# Copy Composer vendor directory from composer-build stage
COPY --from=composer-build /app/vendor ./vendor

# Configure nginx
RUN mkdir -p /etc/nginx/http.d && cat > /etc/nginx/http.d/default.conf <<'EOF'
server {
    listen 80;
    server_name _;
    root /var/www/html/public;
    index index.php index.html;

    # Serve static assets directly
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot|map)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        try_files $uri =404;
    }

    # Route all other requests through Laravel's front controller
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_read_timeout 300;
    }

    # Deny access to hidden files
    location ~ /\. {
        deny all;
    }
}
EOF

# Create .env from .env.example so Laravel can boot before runtime secrets are injected
RUN cp .env.example .env

# Set up storage directories and permissions
RUN mkdir -p \
        storage/framework/sessions \
        storage/framework/views \
        storage/framework/cache \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data . \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 .env

# Startup script: generate app key if missing, then start services
RUN printf '#!/bin/sh\nset -e\n\n# Ensure .env exists (fallback safety net)\nif [ ! -f /var/www/html/.env ]; then\n    cp /var/www/html/.env.example /var/www/html/.env\nfi\n\n# Generate APP_KEY only when it is not already present in .env\nif ! grep -q "^APP_KEY=.\\+" /var/www/html/.env; then\n    php /var/www/html/artisan key:generate --force\nfi\n\n# Create the storage symlink so uploaded files are accessible via HTTP\nphp /var/www/html/artisan storage:link\n\n# Cache config/routes for production performance\nphp /var/www/html/artisan config:cache\nphp /var/www/html/artisan route:cache\nphp /var/www/html/artisan view:cache\n\n# Start PHP-FPM in the background, then nginx in the foreground\nphp-fpm -D\nexec nginx -g "daemon off;"\n' > /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
