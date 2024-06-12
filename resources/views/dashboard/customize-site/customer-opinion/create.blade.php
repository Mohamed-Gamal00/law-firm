@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">تخصيص الموقع</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customer-opinion.index') }}">اّراء العملاء</a></li>
                    <li class="breadcrumb-item"><a href="">اضافة رأي</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="my-5">
        @if (Session::has('image_section'))
            <div class="alert alert-warning text-center" role="alert">
                {{ Session::get('image_section') }}
            </div>
        @endif
        {{-- @include('dashboard.layouts.partials.error_validation') --}}
        <form method="POST" action="{{ route('customer-opinion.store') }}" enctype="multipart/form-data">
            @include('dashboard.customize-site.customer-opinion.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
