@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">من نحن</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="">تخصيص الموقع</a></li>
                    <li class="breadcrumb-item"><a href="">من نحن</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="my-5">
        <form method="POST" action="{{ route('about-us.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('dashboard.customize-site.about-us.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
