@extends('adminlte::page')

@section('title', 'Sort Profiles')

@section('content_header')
    <h1>Total profiles: {{ $total_top_one_hundred }}</h1>
@stop

@section('content')
<form action="{{ url('/admin/profiles/top_one_hundred') }}" method="POST">
    @csrf
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">You can select:  <span>{{ 100 - $total_top_one_hundred }}</span> profiles</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        
                                            <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>  Add profile to Top 100</button>
                                    </div>
                                    <div class="input-group-append ml-4">
                                        <a href="{{ url('/admin/profiles/sort-top-100') }}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-sort"></i> Order Profiles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <!-- Session Flash Message -->
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Username</th>
                                                        <th>Select Profile</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($profiles_add as $profile)
                                                        <tr>
                                                            <td>{{ $profile->f_name }} {{ $profile->l_name }}</td>
                                                            <td>{{ $profile->qb_email }}</td>
                                                            <td>{{ $profile->username }}</td>
                                                            <td>
                                                                <input type="checkbox" name="top_profiles[]" value="{{ $profile->id }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</form>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('template/assets/vendor/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendor/datatables/buttons.dataTables.min.css') }}">
<style>
    #example_filter {
        margin-right: 20px;
    }

    .pagination {
        display: none;
    }

    @media (max-width: 767px) {
        .input-group-append {
            margin-top: 20px !important;
        }

        .input-group {
            display: flex;
            flex-direction: row;
            justify-content: start;
            align-items: start
        }

        
    }
</style>
@stop

@section('js')
<script src="{{ asset('template/assets/vendor/datatables/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/datatables/buttons.print.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            //Buttons
            "dom": 'Bfrtip',
            "buttons": [
            ],
            "bPaginate" : false,
            /* "lengthMenu": [
                [50000, 50, 100, -1],
                [50000, 50, 100, "All"]
            ], */
        });
    });
</script>
@stop
