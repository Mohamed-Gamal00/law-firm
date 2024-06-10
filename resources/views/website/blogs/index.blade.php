@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | المقالات
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
                    <h3>المقالات </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> المركز الاعلامي </li>
                        <li> / </li>
                        <li> المقالات </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div>
        <div class="blogs-section" style="padding: 50px 0px">
            <div class="container">
                <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="one-blog">
                                <img src="{{ asset('storage/'. $blog->image) }}" alt="">
                                <ul>
                                    <li><i class="fa fa-calendar-alt"></i> {{ $blog->created_at }}</li>
                                    <li><i class="fa fa-tag"></i>
                                        {{ $blog->category ? $blog->category->name : 'No Category' }}</li>
                                </ul>
                                <h4>{{ $blog->title }}</h4>
                                <p>{!! substr($blog->desc, 0, 100) !!}
                                </p>
                                <a href="{{ route('show-blog-details', $blog->id) }}">اعرف أكثر <i
                                        class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    @empty
                        <p>empty blogs</p>
                    @endforelse

                </div>
            </div>
        </div>
        <!--=====================================================================-->
        <div class="quick-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <h4>{{ $settings->booking_title }}</h4>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <ul>
                            <li><a href="{{ route('booking') }}">حجز موعد</a></li>
                            <li><a href="{{ route('contact') }}">اتصل بنا </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
