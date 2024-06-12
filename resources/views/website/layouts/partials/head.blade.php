        @php
            use App\Models\Setting;
            $settings = Setting::first() ?? new Setting();
        @endphp
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="{{$settings->meta_description}}">
        <meta name="keywords" content="{{$settings->meta_keywords}}">
        <title> @yield('title')</title>
        <!-- Bootstrap font-awesome css -->
        <link href="{{ asset('website/font-awesome/css/all.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}" />
        <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.css') }}" />
        @yield('css')
