@extends('website.layouts.master')
@section('title')
    {{$settings->meta_title}} | فريق العمل
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
                    <h3>فريق العمل </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="teamWork-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head">
                        <h4>{{ $teamContent->content }}
                        </h4>
                    </div>
                </div>
                @forelse ($teams as $member)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('storage/'.$member->image) }}" alt="">
                            <div class="content">
                                <h4>{{$member->name}}</h4>
                                <span>فريق العمل</span>
                            </div>
                            <div class="overlay">
                                <a href="{{route('member',$member->id)}}"><i class="fa fa-plus"></i> اعرف أكثر </a>
                            </div>
                        </div>
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
                    <h4>{{$settings->booking_title}}</h4>
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
