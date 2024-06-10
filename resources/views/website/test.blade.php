@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | الأخبار
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
                    <h3>الاخبار </h3>
                    <ul>
                        <li> الرئيسية </li>
                        <li> / </li>
                        <li> المركز الاعلامي </li>
                        <li> / </li>
                        <li> الأخبار </li>
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
                    @forelse ($news as $new)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="one-blog">
                                <img src="{{ asset('storage/' . $new->image) }}" alt="">
                                <ul>
                                    <li><i class="fa fa-calendar-alt"></i> {{ $new->created_at }}</li>
                                    <li><i class="fa fa-tag"></i> الاخبار</li>
                                </ul>
                                <h4>{{ $new->title }}</h4>
                                <p>{!! substr($new->desc, 0, 100) !!}
                                </p>
                                <a href="{{route('show-new-details',$new->id)}}">اعرف أكثر <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    @empty
                        <p>empty news</p>
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
    </div>
@endsection
@section('js')
@endsection
