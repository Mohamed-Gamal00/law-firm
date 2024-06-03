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
                    <li class="breadcrumb-item"><a href="{{ route('main-page.index') }}">الصفحة الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="">اضافة نص متحرك</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="my-5">
        {{-- @include('dashboard.layouts.partials.error_validation') --}}
        <form method="POST" action="{{ route('main-page.store') }}" enctype="multipart/form-data">
            @include('dashboard.customize-site.main-page.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
