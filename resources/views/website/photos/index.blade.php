@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | معرض الصور
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
                    <h3>معرض الصور </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> المركز الاعلامي </li>
                        <li> / </li>
                        <li> الصور </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="all-pictures">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="gallery">

                        @forelse ($photos as $photo)
                            <div class="gallery-item">
                                {{-- <img src="{{asset('storage/'. $photo->image)}}" alt=""> --}}
                                <img class="thumb placeholder" src="{{asset('storage/'. $photo->image)}}"
                                    data-src="{{asset('storage/'. $photo->image)}}"
                                    data-image="{{asset('storage/'. $photo->image)}}"
                                    data-title="{{$photo->title}}" alt="Photo by Daniel J. Schwarz">
                                <div class="caption"><span>{{$photo->title}}</span></div>
                            </div>

                        @empty
                        @endforelse


                    </div><!--gallery-->
                </div>

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
    <script src="{{ asset('website/js/lightbox.js') }}"></script>
@endsection
