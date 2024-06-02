<!-- main-sidebar -->
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
                        <span>المدونة</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li> <a href="{{ route('categories.index') }}" class="waves-effect">
                                <i class="mdi mdi-layers"></i>
                                <span>الاقسام</span>
                            </a></li>
                        <li> <a href="{{ route('posts.index') }}" class="waves-effect">
                                <i class="mdi mdi-blogger"></i>
                                <span>المقالات</span>
                            </a></li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('news.index') }}" class="waves-effect">
                        <i class="mdi mdi-newspaper"></i>
                        <span>الاخبار</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('services.index') }}" class="waves-effect">
                        <i class="mdi mdi-medal"></i>
                        <span>الخدمات</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('teams.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-group"></i>
                        <span>الفريق</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('photos.index') }}" class="waves-effect">
                        <i class="mdi mdi-camera-image"></i>
                        <span>الصور</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('videos.index') }}" class="waves-effect">
                        <i class="mdi mdi-file-video"></i>
                        <span>الفيديوهات</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- main-sidebar -->
