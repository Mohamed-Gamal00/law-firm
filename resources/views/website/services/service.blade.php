@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | تفاصيل الخدمة
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
                    {{-- <h3>القانون التجاري الدولي </h3> --}}
                    <h3>{{ $service->title }}</h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> خدماتنا </li>
                        <li> / </li>
                        <li>{{ $service->title }}</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!--=====================================================================-->
    <div class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="details-content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {{-- <img src="{{ asset('storage/' . $service->image) }}" alt=""> --}}
                            <div>
                                {!! $service->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="quick-order">
                            <h4>لطلب خدمة</h4>
                            <h2>{{$service->title}}</h2>
                            <p>{{$service->service_desc}}
                            </p>
                            <h6>اتصل على رقم</h6>
                            <h1>{{$settings->phone}}</h1>
                            <a href="{{$settings->whatsapp}}">تواصل معنا عبر الواتس</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="other-services">
                            <h4>خدماتنا</h4>
                            <ul>
                                {{-- <li><a href="">القانون التجاري الدولي</a></li>
                                <li><a href="">قضايا الضرائب والزكاة والجمارك</a></li>
                                <li><a href="">القانون المالي والمصرفي</a></li>
                                <li><a href="">القضايا والدعاوى التأمينية</a></li> --}}
                                @forelse ($services as $service)
                                    <li><a href="{{route('service',$service->id)}}">{{$service->title}}</a></li>

                                @empty
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
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
                        <li><a href="{{ route('booking') }}">حجز موعد</a></li>
                        <li><a href="{{ route('contact') }}">اتصل بنا </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
