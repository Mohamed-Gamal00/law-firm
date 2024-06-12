@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">الاعدادت</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="">تخصيص الموقع</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">الاعدادات</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="card-header pb-0 mb-3">
        @if (Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <div class="my-5">
        <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
            @method('PUT')
            @include('dashboard.settings.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
