@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">التواصل</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="#">التواصل</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">

                @if (count($contacts))
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
                                                <th>الاسم</th>
                                                <th>الايميل</th>
                                                <th>الهاتف</th>
                                                <th>تفاصيل</th>
                                                <th>اعدادات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                                    <td class="align-middle">{{ $contact->name }}</td>
                                                    <td class="align-middle">{{ $contact->email }}</td>
                                                    <td class="align-middle">{{ $contact->subject }}</td>
                                                    <td class="align-middle">{{ $contact->phone }}</td>
                                                    <td class="align-middle">


                                                        <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                            method="POST" id="deleteForm{{ $contact->id }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <div class="col-sm-6 col-md-6 mg-t-10 mg-md-t-0 p-0">
                                                                <a class="btn btn-secondary btn-sm edit"
                                                                    onclick="confirmDelete({{ $contact->id }})"
                                                                    title="مسح">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </form>

                                                        <script>
                                                            function confirmDelete(id) {
                                                                if (confirm('Are you sure you want to delete this contact?')) {
                                                                    document.getElementById('deleteForm' + id).submit();
                                                                }
                                                            }
                                                        </script>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{ $contacts->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
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
