@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | معرض الفيديوهات
@endsection
@section('css')
@endsection
@section('page-header')
    <div class="header-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('website/images/page.png') }}" alt="">
                </div>
                <div class="con">
                    <h3>معرض الفيديو </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> المركز الاعلامي </li>
                        <li> / </li>
                        <li> معرض الفيديو </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="all-videos">
        <div class="container">
            <div class="row">
                @forelse ($videos as $video)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <iframe width="100%" height="200px" src="{{ asset('storage/' . $video->video_path) }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="quick-about">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <h4>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</h4>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <ul>
                        <li><a href="">حجز موعد</a></li>
                        <li><a href="">اتصل بنا </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
