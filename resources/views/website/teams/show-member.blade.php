@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | فريق العمل
@endsection
@section('css')
@endsection
@section('page-header')
    <div class="header-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="{{asset('website/images/page.png')}}" alt="">
                </div>
                <div class="con">
                    <h3>فريق العمل </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> فريق العمل </li>
                        <li> / </li>
                        <li>{{$member->name}}</li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="teamWork-details-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="the-one">
                        <img src="{{asset('storage/'.$member->image)}}" alt="">
                        <h4>{{$member->name}}</h4>
                        <ul>
                            <li> المهنة : <span> {{$member->job_title}}</span> </li>
                            <li> الخبرة : <span> {{$member->experience}}</span> </li>
                            <li> الايميل : <span> {{$member->email}} </span> </li>
                            <li> رقم الهاتف : <span> {{$member->phone}} </span> </li>
                        </ul>
                        <hr>
                        <ul class="social">
                            <li><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a>
                            <li><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{$member->linked_in}}"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="content">
                        {!!$member->personal_info	!!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
