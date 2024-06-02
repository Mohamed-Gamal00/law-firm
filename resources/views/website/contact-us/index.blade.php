@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | اتصل بنا
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
                    <h3>اتصل بنا </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> اتصل بنا </li>
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
                            <p>6546 6456 646</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="info">
                            <i class="fa fa-envelope"></i>
                            <h3>البريد الالكتروني</h3>
                            <p>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="info">
                            <i class="fa fa-map-marker-alt"></i>
                            <h3>العنوان</h3>
                            <p>هذا النص هو مثال لنص <br>يمكن أن يستبدل في نفس المساحة </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--=====================================================================-->
        <div class="contact-now">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>الاسم</label>
                                <input type="text">
                                <label>البريد الالكتروني</label>
                                <input type="text">
                                <label>رقم الجوال</label>
                                <input type="text">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="" id=""></textarea>

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
    </div>
@endsection
@section('js')
@endsection
