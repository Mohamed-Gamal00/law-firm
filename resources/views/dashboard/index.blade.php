@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->

    <!-- /breadcrumb -->
@endsection
@section('content')
    <div>

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">الرئيسية</h6>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase text-white-50">طلبات التواصل</h5>
                            <h4 class="fw-medium font-size-24">{{ count($contacts) }}
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <a href="{{ route('contacts.index') }}" class="text-white-50"><i
                                        class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">اخر طلب تواصل {{ $timeSinceCreation }} </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="assets/images/services-icon/02.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase text-white-50">الحجوزات</h5>
                            <h4 class="fw-medium font-size-24">{{ count($booking) }}
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <a href="{{ route('booking.index') }}" class="text-white-50"><i
                                        class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">اخر طلب حجز {{ $bookingTimeSinceCreation }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="assets/images/services-icon/03.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase text-white-50">المدونات</h5>
                            <h4 class="fw-medium font-size-24">{{ count($posts) }}
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <a href="{{ route('posts.index') }}" class="text-white-50"><i
                                        class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1"> اخر مقالة تم رفعها {{ $postTimeSinceCreation }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="assets/images/services-icon/04.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase text-white-50">فريق العمل</h5>
                            <h4 class="fw-medium font-size-24">{{ count($teams) }}
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <a href="{{ route('teams.index') }}" class="text-white-50"><i
                                        class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1"> اخر عضو تم اضافته {{ $memberTimeSinceCreation }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
    <!-- End Page-content -->
@endsection
@section('js')
@endsection
