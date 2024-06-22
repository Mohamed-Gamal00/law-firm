<meta charset="utf-8">
@php
    use App\Models\Setting;
    $settings = Setting::select('meta_title')->first() ?? new Setting();

@endphp
<title>{{ $settings->meta_title }}</title>
<title>لوحة تحكم |{{ $settings->meta_title }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
<meta content="Themesbrand" name="author">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

<link href="{{ asset('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">

@yield('css')
<!-- Bootstrap Css -->
<link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{ asset('assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
