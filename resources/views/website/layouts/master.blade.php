<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.layouts.partials.head')
</head>

<body class="">
    <div>
        @php
            use App\Models\Setting;
            $settings = Setting::first();

            if (!$settings) {
                $settings = new Setting();
            }
        @endphp
        @include('website.layouts.partials.main-header', ['settings' => $settings])
        <!-- container -->
        <div>
            @yield('page-header')
            @yield('content')
            @include('website.layouts.partials.footer', ['settings' => $settings])

            @include('website.layouts.partials.footer-scripts')
        </div>
</body>

</html>
