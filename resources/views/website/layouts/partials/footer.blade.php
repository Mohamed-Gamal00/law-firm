<!-- Footer opened -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="logo">
                    <img src="images/logo-gooter.png" alt="">
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-content">
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
                    <p>
                        {{ $settings->footer_content_right }}
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-content">
                    <h3> معلومات التواصل </h3>
                    <ul>
                        {{-- <li> <span>العنوان</span><a href=""> ذا النص هو مثال لنص يمكن أن يستبدل في نفس</a></li> --}}
                        @if ($settings->address)
                            <li> <span>العنوان</span><a> {{ $settings->address }}</a></li>
                        @endif
                        {{-- <li> <span> الهاتف </span> <a href="">+955 4566 3633</a> </li> --}}
                        @if ($settings->phone)
                            <li> <span>الهاتف</span><a> {{ $settings->phone }}</a></li>
                        @endif
                        {{-- <li> <span> البريد الالكترونى </span> <a href="">info@gmail.com </a></li> --}}
                        @if ($settings->email)
                            <li> <span>البريد الالكتروني</span><a> {{ $settings->email }}</a></li>
                        @endif
                        {{-- <li> <span> الفاكس </span><a href="">+955 4566 3633</a> </li> --}}
                        @if ($settings->fax)
                            <li> <span>الفاكس</span><a> {{ $settings->fax }}</a></li>
                        @endif

                    </ul>

                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-content">
                    <h3> روابط الموقع </h3>
                    <ul>
                        <li> <i class="fa fa-long-arrow-alt-left"></i> الرئيسية </li>
                        <li> <i class="fa fa-long-arrow-alt-left"></i> من نحن </li>
                        <li> <i class="fa fa-long-arrow-alt-left"></i> خدماتنا </li>
                        <li> <i class="fa fa-long-arrow-alt-left"></i> فريق العمل </li>
                        <li> <i class="fa fa-long-arrow-alt-left"></i> المركز الاعلامي </li>
                        <li> <i class="fa fa-long-arrow-alt-left"></i> اتصل بنا </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-content">
                    <h3> اشترك معنا ليصلك كل جديد </h3>
                    <h6>
                        {{ $settings->footer_content_left }}
                    </h6>
                    <form action="">
                        <input type="text">
                        <button> <i class="fa fa-paper-plane"></i> </button>
                    </form>


                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="copyright">
                    <p> جميع الحقوق محفوظة </p>
                </div>
            </div>


        </div>
    </div>
</div>
<!--=====================================================================-->
<div id="myButtons" class="buttons">
    <a href="{{route('booking')}}" id="reservation"> <i class="fa fa-ticket-alt"></i>حجز موعد </a>
    <a href="{{ $settings->whatsapp }}" id="whatsapp"> <i class="fab fa-whatsapp"></i>واتساب</a>
    <a href="tel:{{ $settings->phone }}" id="call"> <i class="fa fa-phone"></i>اتصال </a>
</div>
<!-- Footer closed -->
