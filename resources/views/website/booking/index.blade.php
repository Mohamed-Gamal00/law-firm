@extends('website.layouts.master')
@section('title')
    {{$settings->meta_title}} | حجز موعد
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
                    <h3>حجز موعد</h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> حجز موعد </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div>
        <div class="contact-info">
            <div class="container">

                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="info">
                            <i class="fa fa-phone-alt"></i>
                            <h3>الهاتف</h3>
                            <p>{{ $settings->phone }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="info">
                            <i class="fa fa-envelope"></i>
                            <h3>البريد الالكتروني</h3>
                            <p>{{ $settings->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="info">
                            <i class="fa fa-map-marker-alt"></i>
                            <h3>العنوان</h3>
                            <p>{{ $settings->address }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--=====================================================================-->
        <div class="contact-now">
            <div class="container">
                <div class="card-header pb-0 mb-3">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>الاسم</label>
                                <input type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div>
                                        <p class="text-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    </div>
                                @enderror
                                <label>البريد الالكتروني</label>
                                <input type="email" name="email" {{ old('email') }}>
                                @error('email')
                                    <div>
                                        <p class="text-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    </div>
                                @enderror
                                <label>رقم الجوال</label>
                                <input type="text" name="phone" {{ old('phone') }}>
                                @error('phone')
                                    <div>
                                        <p class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    </div>
                                @enderror
                                <label>التاريخ </label>
                                <input type="date" name="date" {{ old('date') }}>
                                @error('date')
                                    <div>
                                        <p class="text-danger">
                                            {{ $errors->first('date') }}
                                        </p>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="subject" {{ old('subject') }} id=""></textarea>
                                @error('subject')
                                    <div>
                                        <p class="text-danger">
                                            {{ $errors->first('subject') }}
                                        </p>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <button> ارسال</button>
                            </div>

                        </form>
                    </div>
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
