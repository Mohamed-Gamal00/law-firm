@extends('website.layouts.master')
@section('title')
    {{$settings->meta_title}} | من نحن
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
                    <h3>من نحن</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="about-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h4>{{ $abotContent->title }}</h4>
                        <p>{{ $abotContent->content }}
                        </p>
                    </div>
                </div>
                @if (count($aboutFeatuers))
                    @foreach ($aboutFeatuers as $feature)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="one">
                                <img src="{{ asset('storage/'.$feature->image) }}" alt="">

                                <h4>
                                    {{ $feature->title }}
                                </h4>

                                <p>{{ $feature->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    No feature
                @endif

                {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="one">
                        <img src="{{ asset('website/images/about-2.png') }}" alt="">
                        <h4>هدف المكتب</h4>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                            المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من
                            النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="one">
                        <img src="{{ asset('website/images/about-3.png') }}" alt="">
                        <h4>هدف المكتب</h4>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                            المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من
                            النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="one">
                        <img src="{{ asset('website/images/about-4.png') }}" alt="">
                        <h4>هدف المكتب</h4>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                            المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من
                            النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق.
                        </p>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="about-featured">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <iframe width="100%" height="315" src="{{ $abotContent->video_link }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="about-content">
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="more-featured">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="one">
                        <i class="fa fa-users"></i>
                        <h4>{{ $abotContent->team_work }}</h4>
                        <span>فريق العمل</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="one">
                        <i class="fa fa-handshake"></i>
                        <h4>{{ $abotContent->happy_clients }}</h4>
                        <span>عمــلاء سـعــــداء </span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="one">
                        <i class="fa fa-gavel"></i>
                        <h4>{{ $abotContent->successful_lawsuits }}</h4>
                        <span>قضــايا و دعــاوي ناجـحـة </span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="one">
                        <i class="fa fa-file-alt"></i>
                        <h4>{{ $abotContent->successful_consultations }}</h4>
                        <span>استـشـارات قـانـونــية نـاجحة </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="about-testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <h2>اراء عملائنا</h2>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonials-slider">
                            @forelse ($customerOpinions as $opinion)
                                <div class="item">
                                    <div class="content">
                                        <p>
                                            {{ $opinion->content }}
                                        </p>
                                        <img src="{{ asset('storage/' . $opinion->image) }}" alt="">
                                        <h5>{{ $opinion->name }}</h5>
                                        <span>{{ $opinion->status }}</span>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="pic">
                        <img src="{{ asset('storage/' . $image_section->image_section) }}" alt="">
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
@endsection
@section('js')
@endsection
