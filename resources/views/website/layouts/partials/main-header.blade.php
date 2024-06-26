<!-- main-header -->
<!--=====================================================================-->
<div class="the-after" onclick="closeNav()"></div>
<!--=====================================================================-->
<div id="mySidenav" class="sidenav">
    <div class="col-xs-12">
        {{-- <img src="{{ asset('website/images/logo.png') }}" alt=""> --}}
        @if ($settings->logo)
            <img style="object-fit: cover;border-radius: 8px;" src="{{ asset("storage/$settings->logo") }}" width="100%"
                height="60" alt="img">
        @endif
    </div>
    <div class="col-xs-12">
        <ul class="main-menu">
            <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> الرئيسية </a></li>
            <li><a href="{{ route('about') }}"> <i class="fa fa-info-circle"></i> من نحن </a></li>
            <li><a href="{{ route('services') }}"> <i class="fa fa-pen-alt"></i> خدماتنا </a></li>
            <li><a href="{{ route('teams') }}"> <i class="fa fa-user-alt"></i> فريق العمل </a></li>
            <li><a href="#" data-toggle="dropdown"> <i class="fa fa-layer-group"></i> المركز الإعلامي <i
                        class="fa fa-angle-down down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="gallery.html">معرض الصور</a></li>
                    <li><a href="{{ route('videos') }}">معرض الفيديو</a></li>
                    <li><a href="{{ route('news') }}">الأخبار</a></li>
                </ul>
            </li>
            <li><a href="{{ route('contact') }}"> <i class="fa fa-phone"></i> تصل بنا </a></li>

        </ul>
        <ul class="social">
            @if ($settings->tw_link)
                <li><a href="{{ $settings->tw_link }}"><i class="fab fa-twitter"></i></a>
            @endif
            @if ($settings->fb_link)
                <li><a href="{{ $settings->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
            @endif
            @if ($settings->insta_link)
                <li><a href="{{ $settings->insta_link }}"><i class="fab fa-instagram"></i></a></li>
            @endif
            @if ($settings->linkdin_link)
                <li><a href="{{ $settings->linkdin_link }}"><i class="fab fa-linkedin-in"></i></a></li>
            @endif


        </ul>
        <a class="booking" href=""> حجز موعد</a>
    </div>
    <hr>
</div><!--sidenav-->
<!--=====================================================================-->
<div class="up-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul>
                    {{-- <li><a href=""><i class="far fa-envelope"></i>ceo@info.com</a></li> --}}
                    {{-- <li><a href=""> <i class="fa fa-phone-alt"></i>+971563579468</a></li> --}}
                    {{-- <li><a href=""><i class="far fa-envelope"></i>{{ $settings->email }}</a></li> --}}
                    @if ($settings->email)
                        <li><a href=""><i class="far fa-envelope"></i>{{ $settings->email }}</a></li>
                    @endif
                    @if ($settings->phone)
                        <li><a href=""> <i class="fa fa-phone-alt"></i>+{{ $settings->phone }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!--=====================================================================-->
<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-6">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        {{-- <img class="img-responsive"
                            src="{{ asset('website/images/logo.png') }}" alt=""> --}}
                        @if ($settings->logo)
                            <img class="img-responsive" src="{{ asset("storage/$settings->logo") }}" alt="img">
                        @endif

                    </a>
                </div>
            </div>
            <div class="col-md-10 col-sm-6 col-xs-6">
                <div class="menu">
                    <ul class="main-menu">
                        <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> الرئيسية </a></li>
                        <li><a href="{{ route('about') }}"> <i class="fa fa-info-circle"></i> من نحن </a></li>
                        <li><a href="{{ route('services') }}"> <i class="fa fa-pen-alt"></i> خدماتنا </a></li>
                        <li><a href="{{ route('teams') }}"> <i class="fa fa-user-alt"></i> فريق العمل </a></li>
                        <li><a href="#" data-toggle="dropdown"> <i class="fa fa-layer-group"></i> المركز الإعلامي
                                <i class="fa fa-angle-down down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('galleries') }}">معرض الصور</a></li>
                                <li><a href="{{ route('videos') }}">معرض الفيديو</a></li>
                                <li><a href="{{ route('news') }}">الأخبار</a></li>

                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}"> <i class="fa fa-phone"></i> اتصل بنا </a></li>

                    </ul>
                    <ul class="social">
                        @if ($settings->tw_link)
                            <li><a href="{{ $settings->tw_link }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if ($settings->fb_link)
                            <li><a href="{{ $settings->fb_link }}"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if ($settings->insta_link)
                            <li><a href="{{ $settings->insta_link }}"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if ($settings->linkdin_link)
                            <li><a href="{{ $settings->linkdin_link }}"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif


                    </ul>
                    <ul class="other">
                        <li class="searching"> <i class="fa fa-search"></i> </li>
                        <li><a href=""><img src="{{ asset('website/images/us.png') }}" alt=""></a> </li>
                    </ul>
                    <a class="booking" href="{{ route('booking') }}"> حجز موعد</a>
                </div>
                <div class="hidden-xx">
                    <i class="fa fa-bars" onclick="openNav()"></i>
                    <i class="fa fa-search searching"></i>
                    <a href=""><img src="{{ asset('website/images/us.png') }}" alt=""></a>
                </div>
            </div>

        </div>
    </div>
</div>
<!--=====================================================================-->
<div class="searching-bar">
    <form action="">
        <input type="text" placeholder="ما تريد البحث عنه ....">
        <button><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- /main-header -->
