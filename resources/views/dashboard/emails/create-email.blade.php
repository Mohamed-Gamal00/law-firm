@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">الايميلات</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="#">الايميلات</a></li>
                    <li class="breadcrumb-item"><a href="#">ارسال ايميل</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
<div class="container">
    {{-- <h2>Send Email to Clients</h2> --}}
    <form action="{{ route('emails.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="emails">اختار الايميل المرسل اليه</label>
            <select id="emails-select" class="select2 form-control select2-multiple" name="emails[]" multiple="multiple" data-placeholder="Choose ...">
                <option value="all">Select All</option>
                @foreach ($emails as $email)
                    <option value="{{ $email->email }}">{{ $email->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subject">العنوان</label>
            <input type="text" name="subject" value="{{old('subject')}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">الموضوع</label>
            <textarea name="message" class="form-control" rows="5" required>{{old('message')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">ارسل</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#emails-select').select2();

    $('#emails-select').on('select2:select', function (e) {
        var data = e.params.data;
        if (data.id === 'all') {
            $('#emails-select > option').prop('selected', true);
            $('#emails-select').find('option[value="all"]').prop('selected', false);
            $('#emails-select').trigger('change');
        }
    });

    $('#emails-select').on('select2:unselect', function (e) {
        var data = e.params.data;
        if (data.id === 'all') {
            $('#emails-select > option').prop('selected', false);
            $('#emails-select').trigger('change');
        }
    });
});
</script>

@endsection

@section('js')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
@endsection
