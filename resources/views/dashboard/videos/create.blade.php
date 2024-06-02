@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">الفيديوهات</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">الفيديوهات</a></li>
                    <li class="breadcrumb-item"><a href="">اضافة فيديو</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="my-5">
        {{-- @include('dashboard.layouts.partials.error_validation') --}}
        <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
            @include('dashboard.videos.form')
        </form>
    </div>
@endsection
@section('js')
@endsection
