<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    @include('dashboard.layouts.partials.head')
</head>

{{-- <body data-bs-theme="dark" class="main-body app sidebar-mini "> --}}

<body data-sidebar="dark" class="main-body app sidebar-mini ">
    <!-- Loader -->
    <div id="global-loader">
        <!-- /Loader -->
        @include('dashboard.layouts.partials.main-sidebar')
        <!-- main-content -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @php
                        use App\Models\Setting;
                        $settings = Setting::first() ?? new Setting();
                    @endphp
                    @include('dashboard.layouts.partials.main-header', ['settings' => $settings])
                    <!-- container -->
                    <div class="container-fluid">
                        @yield('page-header')
                        @yield('content')
                        {{-- @include('dashboard.layouts.partials.sidebar-right')
                            @include('dashboard.layouts.partials.models') --}}
                        @include('dashboard.layouts.partials.footer')
                        @include('dashboard.layouts.partials.footer-scripts')
                    </div>
                </div>
            </div>

        </div>
</body>

</html>
