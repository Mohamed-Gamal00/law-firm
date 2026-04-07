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
FROM composer:2 AS composer-build

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --optimize-autoloader \
    --ignore-platform-reqs

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

# Set up storage directories and permissions
RUN mkdir -p \
        storage/framework/sessions \
        storage/framework/views \
        storage/framework/cache \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Startup script: generate app key if missing, run migrations, then start services
RUN cat > /usr/local/bin/start.sh <<'EOF'
#!/bin/sh
set -e

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Cache config/routes for production performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in the background, then nginx in the foreground
php-fpm -D
exec nginx -g "daemon off;"
EOF

RUN chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
