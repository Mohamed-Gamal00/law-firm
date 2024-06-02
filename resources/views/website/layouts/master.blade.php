<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.layouts.partials.head')
</head>

<body class="">
    <div>
        @include('website.layouts.partials.main-header')
        <!-- container -->
        <div>
            @yield('page-header')
            @yield('content')
            @include('website.layouts.partials.footer')

            @include('website.layouts.partials.footer-scripts')
        </div>
</body>

</html>
