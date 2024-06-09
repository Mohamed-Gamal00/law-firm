@extends('website.layouts.master')
@section('title')
    مكتب صهيب علي امام | الرئيسية
@endsection
@section('css')
@endsection
@section('page-header')
@endsection
@section('content')
    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main-slider">
                        @if ($maincontent)
                            @foreach ($maincontent as $main)
                                <div class="item">
                                    <div class="content">
                                        <h3>{{ $main->title }}</h3>
                                        <p>ه{{ $main->content }}
                                        <div class="links">
                                            <a href="{{ route('booking') }}">حجز موعد</a>
                                            <a href="{{ route('about') }}">معلومات عنا</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="quick">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    {{-- <h4>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</h4> --}}
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
    <!--================================== about us ===================================-->
    @if ($abotContent)
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="content">
                            <img src="{{ asset('website/images/mini.png') }}" alt="">
                            <h4>من نحن</h4>
                            <h3>{{ $abotContent->title }}</h3>
                            <p>{{ $abotContent->content }}
                            </p>
                            <ul>
                                @if ($abotContent->points && count(json_decode($abotContent->points, true)) > 1)
                                    <ul>
                                        @foreach (json_decode($abotContent->points, true) as $point)
                                            <li>
                                                <i class="fa fa-check-circle"></i>
                                                {{ $point }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    No certifications
                                @endif
                                {{-- @if (is_array($abotContent->points))
                                    @foreach ($abotContent->points as $point)
                                        <li>
                                            <i class="fa fa-check-circle"></i>
                                            {{ $point }}
                                        </li>
                                    @endforeach
                                @else
                                    <li>No points available</li>
                                @endif --}}
                                {{-- <li> <i class="fa fa-check-circle"></i> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                                </li>
                                <li> <i class="fa fa-check-circle"></i> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                                </li>
                                <li> <i class="fa fa-check-circle"></i> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                                </li>
                                <li> <i class="fa fa-check-circle"></i> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                                </li>
                                <li> <i class="fa fa-check-circle"></i> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                                </li> --}}

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="pic">
                            <img src="{{ asset('website/images/about.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--=====================================================================-->
    <div class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head">
                        <img src="{{ asset('website/images/mini.png') }}" alt="">
                        <h4>خدماتنا</h4>
                        <p>{{ $serviceContent->content }}
                        </p>
                    </div>
                </div>
                @forelse ($services as $service)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('storage/'.$service->image) }}" alt="">
                            <h4>{{$service->title}}</h4>
                            <p>{{$service->desc}}
                            </p>
                            <a href="{{route('service',$service->id)}}"> <i class="fa fa-plus"></i> أعرف اكثر</a>
                        </div>
                    </div>

                @empty
                services is empty
                @endforelse

            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="featured-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="content">
                        <h4>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</h4>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                            المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من
                            النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق.
                        </p>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="con">
                                    <h4>{{ $abotContent->team_work }}</h4>
                                    <span>فريق العمل</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <div class="icon">
                                    <i class="fa fa-handshake"></i>
                                </div>
                                <div class="con">
                                    <h4>{{ $abotContent->happy_clients }}</h4>
                                    <span> عملاء سعداء</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <div class="icon">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="con">
                                    <h4>{{ $abotContent->successful_lawsuits }}</h4>
                                    <span>قضايا و دعاوي ناجحة </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <div class="icon">
                                    <i class="fa fa-file-alt"></i>
                                </div>
                                <div class="con">
                                    <h4>{{ $abotContent->successful_consultations }}</h4>
                                    <span>استشارات قانونية ناجحة </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="teamWork-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head">
                        <img src="{{ asset('website/images/mini.png') }}" alt="">
                        <h4>فريق العمل</h4>
                        <p>{{ $teamContent->content }}
                        </p>
                    </div>
                </div>
                @forelse ($teams as $member)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="">
                            <div class="content">
                                <h4>{{ $member->nsme }}</h4>
                                <span>فريق العمل</span>
                            </div>
                            <div class="overlay">
                                <a href="{{ route('member', $member->id) }}"> <i class="fa fa-plus"></i> اعرف أكثر </a>
                            </div>
                        </div>
                    </div>

                @empty
                    empty field
                @endforelse
                {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="one">
                        <img src="{{ asset('website/images/pic-1.png') }}" alt="">
                        <div class="content">
                            <h4>صهيب على امام</h4>
                            <span>فريق العمل</span>
                        </div>
                        <div class="overlay">
                            <a href=""> <i class="fa fa-plus"></i> اعرف أكثر </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="one">
                        <img src="{{ asset('website/images/pic-1.png') }}" alt="">
                        <div class="content">
                            <h4>صهيب على امام</h4>
                            <span>فريق العمل</span>
                        </div>
                        <div class="overlay">
                            <a href=""> <i class="fa fa-plus"></i> اعرف أكثر </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="one">
                        <img src="{{ asset('website/images/pic-1.png') }}" alt="">
                        <div class="content">
                            <h4>صهيب على امام</h4>
                            <span>فريق العمل</span>
                        </div>
                        <div class="overlay">
                            <a href=""> <i class="fa fa-plus"></i> اعرف أكثر </a>
                        </div>
                    </div>
                </div> --}}
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="see-more">
                        <a href="{{ route('teams') }}">باقى فريق العمل</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="media-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="content">
                        <h3>المركز الإعلامي</h3>
                        <h5>{{ $mediaCenterContent->title }}</h5>
                        <p>{{ $mediaCenterContent->content }}</p>
                        <ul>
                            <li><a href="{{route('news')}}">الاخبار</a></li>
                            <li><a href="{{route('galleries')}}">معرض صور </a></li>
                            <li><a href="{{route('videos')}}">معرض فيديو</a></li>
                            <li><a href="{{route('blogs')}}">مدونة</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <iframe width="100%" height="315" src="{{ $mediaCenterContent->video_link }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="blogs-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head">
                        <img src="{{ asset('website/images/mini.png') }}" alt="">
                        <h4> مدونة </h4>
                        <p>{{ $blogContent->content }}
                        </p>
                    </div>
                </div>
                @forelse ($posts as $post)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="one-blog">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="">
                            <ul>
                                <li><i class="fa fa-calendar-alt"></i> {{ $post->created_at }}</li>
                                <li><i class="fa fa-tag"></i>
                                    {{ $post->category ? $post->category->name : 'No Category' }}</li>
                            </ul>
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->desc }}
                            </p>
                            <a href="">اعرف أكثر <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                @empty
                @endforelse

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="see-more">
                        <a href="{{ route('blogs') }}">باقى المقالات </a>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
