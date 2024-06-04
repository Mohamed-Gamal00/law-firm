@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | خدماتنا
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
                    <h3>خدماتنا </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> خدماتنا </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div>
        <div class="services-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="con">
                            <h4>{{$serviceContent->title}}</h4>
                            <p>{{$serviceContent->content}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('website/images/icon-1.png') }}" alt="">
                            <h4>القانون التجاري الدولي</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن
                                يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا
                                النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.
                            </p>
                            <a href=""> <i class="fa fa-plus"></i> أعرف اكثر</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('website/images/icon-2.png') }}" alt="">
                            <h4>قضايا الضرائب والزكاة والجمارك</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن
                                يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا
                                النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.
                            </p>
                            <a href=""> <i class="fa fa-plus"></i> أعرف اكثر</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('website/images/icon-3.png') }}" alt="">
                            <h4>القضايا والدعاوى التأمينية</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن
                                يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا
                                النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.
                            </p>
                            <a href=""> <i class="fa fa-plus"></i> أعرف اكثر</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('website/images/icon-4.png') }}" alt="">
                            <h4>القانون المالي والمصرفي</h4>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن
                                يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا
                                النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                                التى يولدها التطبيق.
                            </p>
                            <a href=""> <i class="fa fa-plus"></i> أعرف اكثر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=====================================================================-->
        <div class="media-section" style="margin-bottom: 0px;margin-top: 50px">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="content">
                            <h3>المركز الإعلامي</h3>
                            <h5>{{$mediaCenterContent->title}}</h5>
                            <p>{{$mediaCenterContent->content}}</p>
                            <ul>
                                <li><a href="">الاخبار</a></li>
                                <li><a href="">معرض صور </a></li>
                                <li><a href="">معرض فيديو</a></li>
                                <li><a href="">مدونة</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <iframe width="100%" height="315" src="{{$mediaCenterContent->video_link}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
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
                            <li><a href="{{route('booking')}}">حجز موعد</a></li>
                            <li><a href="{{route('contact')}}">اتصل بنا </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
