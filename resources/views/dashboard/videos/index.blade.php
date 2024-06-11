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
                    <li class="breadcrumb-item"><a href="#">الفيديوهات</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a class="btn btn-primary" href="{{ route('videos.create') }}" type="button">
                            <i class="mdi mdi-plus me-2"></i> اضافة فيديو
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

                @if (count($videos))
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
                                                {{-- <th>العنوان</th> --}}
                                                <th>الفيديوهاتة</th>
                                                <th>اعدادات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videos as $video)
                                                <tr>
                                                    <th scope="row " class="align-middle">{{ $loop->iteration }}</th>
                                                    {{-- <td class="align-middle">{{ $video->title?$video->title:'no title exist' }}</td> --}}
                                                    <td class="align-middle">
                                                        <iframe width="250px" height="130px"
                                                            src="{{ $video->video_path }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </td>
                                                    <td class="align-middle">

                                                        <form action="{{ route('videos.destroy', $video->id) }}"
                                                            method="POST" id="deleteForm{{ $video->id }}">
                                                            @csrf
                                                            @method('DELETE')


                                                            <div class="col-sm-8 col-md-4 mg-t-10 mg-md-t-0 p-0">
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    href="{{ route('videos.edit', $video->id) }}"
                                                                    title="تعديل">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    onclick="confirmDelete({{ $video->id }})"
                                                                    title="مسح">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>

                                                            </div>
                                                        </form>

                                                        <script>
                                                            function confirmDelete(id) {
                                                                if (confirm('Are you sure you want to delete this video?')) {
                                                                    document.getElementById('deleteForm' + id).submit();
                                                                }
                                                            }
                                                        </script>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{ $videos->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
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
