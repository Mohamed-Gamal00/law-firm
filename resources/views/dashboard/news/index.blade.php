@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">الاخبار</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="#">الاخبار</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a class="btn btn-primary" href="{{ route('news.create') }}" type="button">
                            <i class="mdi mdi-plus me-2"></i> اضافة خبر
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">

                @if (count($news))
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
                                                <th>الصورة</th>
                                                <th>العنوان</th>
                                                {{-- <th>المحتوي</th> --}}
                                                <th>الوصف</th>
                                                <th>اعدادات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $new)
                                                <tr>
                                                    <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                                    <td class="align-middle"><img
                                                            style="object-fit: cover;border-radius: 8px;"
                                                            src="{{ asset("storage/$new->image") }}" width="60"
                                                            height="60" alt="img"></td>
                                                    <td class="align-middle">{{ $new->title }}</td>
                                                    {{-- <td class="align-middle">{!! $new->content !!}</td> --}}
                                                    <td class="align-middle">{{ $new->desc }}</td>
                                                    <td class="align-middle">

                                                        <form action="{{ route('news.destroy', $new->id) }}" method="POST"
                                                            id="deleteForm{{ $new->id }}">
                                                            @csrf
                                                            @method('DELETE')


                                                            <div class="col-sm-6 col-md-12 mg-t-10 mg-md-t-0 p-0">
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    href="{{ route('news.edit', $new->id) }}"
                                                                    title="تعديل">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    onclick="confirmDelete({{ $new->id }})"
                                                                    title="مسح">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </form>

                                                        <script>
                                                            function confirmDelete(id) {
                                                                if (confirm('Are you sure you want to delete this new?')) {
                                                                    document.getElementById('deleteForm' + id).submit();
                                                                }
                                                            }
                                                        </script>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{ $news->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>
                @else
                    <div class="alert alert-info alert-dismissible fade show mb-0 text-center" role="alert">
                        <strong></strong> لا توجد بيانات.
                    </div>
                @endif
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>




@endsection
@section('js')
@endsection
