@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | تفاصيل الأخبار
@endsection
@section('css')
    <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }

        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
        }
    </style>
@endsection
@section('page-header')
    <div class="header-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="{{ asset('website/images/page.png') }}" alt="">
                </div>
                <div class="con">
                    <h3>{{ $blog->title }}</h3>
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
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="content">
                        <img src="images/blog-2.png" alt="">
                        <h4>{{ $blog->title }}</h4>
                        <div>
                            {!! $blog->content !!}
                        </div>
                        {{-- <ul class="social">
                            <li>مشاركة : </li>
                            <li><a href="{{ $shareLinks['facebook'] }}"><i class="fab fa-twitter"></i></a>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                        </ul> --}}
                        <ul class="social">
                            <li>مشاركة : </li>
                            <li>
                                <a href="{{ $shareLinks['twitter'] }}" target="_blank"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li><a href="{{ $shareLinks['facebook'] }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $shareLinks['telegram'] }}"><i class="fab fa-telegram"></i></a></li>
                            <li><a href="{{ $shareLinks['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $shareLinks['whatsapp'] }}"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>

                        {{-- <div class="container mt-4">
                            {!! $shareLinks !!}
                        </div> --}}
                        <hr>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="next-blog">
                                @if ($next)
                                    <h5>
                                        {{ $next->title }}
                                        <a href="{{ route('show-blog-details', $next->id) }}">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="prev-blog">
                                @if ($previous)
                                    <h5>
                                        {{ $previous->title }}
                                        <a href="{{ route('show-blog-details', $previous->id) }}">
                                            <i class="fa fa-arrow-circle-left"></i>
                                        </a>
                                    </h5>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="other-services">
                            <h4>خدماتنا</h4>
                            <ul>

                                @forelse ($services as $service)
                                    <li><a href="{{ route('service', $service->id) }}">{{ $service->title }}</a></li>

                                @empty
                                    <p>not found</p>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                    @if (count($blogs) > 0)
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="latest-news">
                                <h4>أخر الأخبار</h4>
                                @forelse ($blogs as $blog)
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <div class="con">
                                                <a href="{{route('show-blog-details',$blog->id)}}">{{ $blog->title }}</a>
                                                <p>{{ $blog->desc }}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                @empty
                                @endforelse

                            </div>
                        </div>
                    @endif

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
