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
                            @if ($contacts)
                                <h4 class="fw-medium font-size-24">{{ count($contacts) }}
                                </h4>
                            @endif
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

        <div class="row">
            <div class="row">
                {{-- طلبات التواصل --}}
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">أخر طلبات التواصل</h4>
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الايميل</th>
                                            <th>الهاتف</th>
                                            <th>الوصف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lastContacts as $contact)
                                            <tr>
                                                <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                                <td class="align-middle">{{ $contact->name }}</td>
                                                <td class="align-middle">{{ $contact->email }}</td>
                                                <td class="align-middle">{{ $contact->phone }}</td>
                                                <td class="align-middle">{{ $contact->subject }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- bd -->
                        </div>
                    </div>
                </div>
                {{-- طلبات الحجز --}}
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">أخر طلبات الحجز</h4>
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الايميل</th>
                                            <th>الهاتف</th>
                                            <th>التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lastBooks as $book)
                                            <tr>
                                                <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                                <td class="align-middle">{{ $book->name }}</td>
                                                <td class="align-middle">{{ $book->email }}</td>
                                                <td class="align-middle">{{ $book->phone }}</td>
                                                <td class="align-middle">{{ $book->date }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- bd -->
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
