@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">الصور</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="#">الصور</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a class="btn btn-primary" href="{{ route('photos.create') }}" type="button">
                            <i class="mdi mdi-plus me-2"></i> اضافة صورة
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">

                @if (count($photos))
                    <div class="col-xl-12 px-0">
                        <div class="card">
                            <div class="card-header pb-0 mb-3">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">



                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>العنوان</th>
                                                <th>الصورة</th>
                                                <th>اعدادات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($photos as $photo)
                                                <tr>
                                                    <th scope="row " class="align-middle">{{ $loop->iteration }}</th>
                                                    <td class="align-middle">{{ $photo->title?$photo->title:'' }}</td>
                                                    <td class="align-middle"><img
                                                            style="object-fit: cover;border-radius: 8px;"
                                                            src="{{ asset("storage/$photo->image") }}" width="60"
                                                            height="60" alt="img"></td>
                                                    <td class="align-middle">

                                                        <form action="{{ route('photos.destroy', $photo->id) }}"
                                                            method="POST" id="deleteForm{{ $photo->id }}">
                                                            @csrf
                                                            @method('DELETE')


                                                            <div class="col-sm-8 col-md-4 mg-t-10 mg-md-t-0 p-0">
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    href="{{ route('photos.edit', $photo->id) }}"
                                                                    title="تعديل">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    onclick="confirmDelete({{ $photo->id }})"
                                                                    title="مسح">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>

                                                            </div>
                                                        </form>

                                                        <script>
                                                            function confirmDelete(id) {
                                                                if (confirm('Are you sure you want to delete this photo?')) {
                                                                    document.getElementById('deleteForm' + id).submit();
                                                                }
                                                            }
                                                        </script>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{ $photos->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>
                @else
                    <div class="alert alert-info alert-dismissible fade show mb-0 text-center" role="alert">
                         لا يوجد بيانات
                    </div>
                @endif
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
@section('js')
@endsection
