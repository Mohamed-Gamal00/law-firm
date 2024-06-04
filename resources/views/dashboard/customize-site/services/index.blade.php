@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">الخدمات</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="">تخصيص الموقع</a></li>
                    <li class="breadcrumb-item"><a href="#"> الخدمات</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="my-5">
                    <form method="POST" action="{{ route('service-content.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.customize-site.services.form')
                    </form>
                </div>

            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
@section('js')
@endsection
