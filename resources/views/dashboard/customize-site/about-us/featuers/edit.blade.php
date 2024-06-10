@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">تخصيص الموقع</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('main-page.index') }}">الصفحة الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="">تعديل ميزة</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="my-5">
        {{-- @include('dashboard.layouts.partials.error_validation') --}}
        <form method="POST" action="{{ route('featuers.update',$featuer) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('dashboard.customize-site.about-us.featuers.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
