@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">المقالات</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">الاخبار</a></li>
                    <li class="breadcrumb-item"><a href="">تعديل خبر</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="my-5">
        {{-- @include('dashboard.layouts.partials.error_validation') --}}
        <form method="POST" action="{{ route('services.update',$service->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('dashboard.services.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
