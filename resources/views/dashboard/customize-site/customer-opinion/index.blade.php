@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">اراء العملاء</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="">تخصيص الموقع</a></li>
                    <li class="breadcrumb-item"><a href="#">اراء العملاء</a></li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <a class="btn btn-primary" href="{{ route('customer-opinion.create') }}" type="button">
                            <i class="mdi mdi-plus me-2"></i> اضافة رأي
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

                @if (count($data))
                    <div class="col-xl-12 px-0">
                        <div class="card">
                            <div class="card-header pb-0 mb-3">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::has('image_section'))
                                    <div class="alert alert-warning text-center" role="alert">
                                        {{ Session::get('image_section') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        @if ($image_section)
                                            <div class="form-group my-3">
                                                <label for="image_section">صورة الرئيسية </label>
                                                <div class="mt-1" id="imagePreview2">

                                                    @if ($image_section)
                                                        <img style="object-fit: cover"
                                                            src="{{ asset("storage/$image_section->image_section") }}"
                                                            width="100" height="100" alt="image_section">
                                                    @endif
                                                </div>
                                                @error('image_section')
                                                    <div>
                                                        <p class="text-danger">
                                                            {{ $errors->first('image_section') }}
                                                        </p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <script>
                                                function previewImage(input, previewId) {
                                                    var file = input.files[0];
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        var imgPreview = document.getElementById(previewId);
                                                        imgPreview.innerHTML = '<img src="' + e.target.result + '" width="60" height="60" alt="preview">';
                                                    }
                                                    reader.readAsDataURL(file);
                                                }
                                            </script>
                                        @endif

                                        @if ($image_section)
                                            <div>
                                                <a class="btn btn-secondary btn-sm edit"
                                                    href="{{ route('customer-opinion.edit', $image_section->id) }}"
                                                    title="تعديل">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                </div>



                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الصورة</th>
                                                {{-- <th>الصورة</th> --}}
                                                <th>المحتوي</th>
                                                <th>اسم العميل</th>
                                                <th>الحالة</th>
                                                <th>اعدادات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                                                    <td class="align-middle"><img
                                                            style="object-fit: cover;border-radius: 8px;"
                                                            src="{{ asset("storage/$item->image") }}" width="60"
                                                            height="60" alt="img"></td>
                                                    {{-- <td class="align-middle"><img
                                                            style="object-fit: cover;border-radius: 8px;"
                                                            src="{{ asset("storage/$item->image_section") }}" width="60"
                                                            height="60" alt="img"></td> --}}
                                                    <td class="align-middle">{{ $item->content }}</td>
                                                    <td class="align-middle">{{ $item->name }}</td>
                                                    <td class="align-middle">{{ $item->status }}</td>
                                                    <td class="align-middle">

                                                        <form action="{{ route('customer-opinion.destroy', $item->id) }}"
                                                            method="POST" id="deleteForm{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')


                                                            <div class="col-sm-8 col-md-12 d-flex mg-t-10 mg-md-t-0 p-0">
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    href="{{ route('customer-opinion.edit', $item->id) }}"
                                                                    title="تعديل">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    onclick="confirmDelete({{ $item->id }})"
                                                                    title="مسح">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>

                                                            </div>
                                                        </form>

                                                        <script>
                                                            function confirmDelete(id) {
                                                                if (confirm('Are you sure you want to delete this item?')) {
                                                                    document.getElementById('deleteForm' + id).submit();
                                                                }
                                                            }
                                                        </script>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{ $data->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>
                @else
                    <div class="alert alert-info alert-dismissible fade show mb-0 text-center" role="alert">
                        <strong></strong> no content exist.
                    </div>
                @endif
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
@endsection
@section('js')
@endsection
