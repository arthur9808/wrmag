@extends('adminlte::page')

@section('title', 'Profiles')

@section('content_header')
    <h1>Profiles</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profiles</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append mr-4 btn_page">
                                        <a href="{{ url('/admin/profiles/create') }}" class="btn btn-sm btn-success"><i
                                                class="fa fa-plus"></i> Add Profile</a>
                                    </div>
                                    <div class="input-group-append mr-4 btn_page">
                                        <a href="{{ url('/admin/profiles/top-100') }}" class="btn btn-sm btn-success"><i
                                                class="fa fa-plus"></i> Add profile to Top 100</a>
                                    </div>
                                    <div class="input-group-append btn_page">
                                        <form action="{{ url('/admin/profiles/send-all-confirmation-emails') }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Do you want to resend the confirmation email to all profiles?')"
                                                class="btn btn-sm btn-success"><i class="fa fa-envelope"></i> Resend all
                                                confirmation emails</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Messages to delete -->
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            {{-- <th></th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profiles as $profile)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $profile->f_name . ' ' . $profile->l_name }}
                                                </td>
                                                <td>
                                                    {{ $profile->qb_email }}
                                                </td>
                                                <td>
                                                    @if ($profile->confirm_email == 1)
                                                        <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <!-- Format for Created At Month, Day, Year and Time -->
                                                <td>
                                                    <!-- Date Format in PST Format and timezone -->
                                                    <?php
                                                        $datetime = $profile->created_at->setTimezone('America/Los_Angeles');
                                                    ?>
                                                    {{ date('M j, Y g:i A', strtotime($datetime)) }}

                                                </td>
                                                <!-- View Live Profile -->
                                                <td>
                                                    <a href="{{ url('/profile/' . $profile->slug) }}" target="_blank"
                                                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View
                                                        Live</a>
                                                </td>
                                                <!-- End View Live Profile -->

                                                <!-- Edit Profile as Admin -->
                                                <td>
                                                    <a href="{{ url('admin/profiles/' . $profile->id . '/edit') }}"
                                                        target="_blank" class="btn btn-sm btn-default"><i
                                                            class="fa fa-edit"></i> Edit</a>
                                                </td>
                                                <!-- End Edit Profile as Admin -->

                                                <!-- Upgrade to Premium -->
                                                <td>
                                                    @if (/* $profile->active_membership == 1 ||  */ $profile->membership_id != null)
                                                        <a href="{{ url('admin/profiles/' . $profile->id . '/upgrade') }}"
                                                            class="btn btn-sm btn-warning"><i class="fa fa-arrow-up"></i>
                                                            UPGRADE</a>
                                                    @endif
                                                </td>
                                                <!-- End Upgrade to Premium -->

                                                <!-- Upgrade to Premium With Pay -->
                                                <td>
                                                    @if ($profile->membership_id != null && $profile->stripe_customer_id != null)
                                                        <a href="{{ url('admin/profiles/' . $profile->id . '/upgrade-paid') }}"
                                                            class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i>
                                                            UPGRADE PAID</a>
                                                    @endif
                                                </td>
                                                <!-- End Upgrade to Premium With Pay -->

                                                <!-- Delete Profile -->
                                                {{-- <td>
                                    <form action="{{ url('admin/profiles/'.$profile->id) }}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('Do you want to remove this Profile?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                                    </form>
                                </td> --}}
                                                <!-- End Delete Profile -->

                                                <!-- Cancel Subscription -->
                                                <td>
                                                    <form action="{{ url('admin/profiles/' . $profile->id . '/cancel') }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to cancel this subscription? If you cancel the subscription, all the information related to the profile will be deleted.  \n Name: {{ $profile->f_name . ' ' . $profile->l_name }} \n Email: {{ $profile->qb_email }}')"
                                                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> CANCEL
                                                            SUBSCRIPTION</button>
                                                    </form>
                                                </td>
                                                <!-- End Cancel Subscription -->

                                                <!-- Resend Email Confirmation -->
                                                <td>
                                                    @if ($profile->confirm_email != 1)
                                                        <form
                                                            action="{{ url('admin/profiles/' . $profile->id . '/resend') }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Do you want to resend this Profile\'s email confirmation?')"
                                                                class="btn btn-sm btn-success"><i
                                                                    class="fa fa-envelope"></i> Resend Email
                                                                Confirmation</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <!-- End Resend Email Confirmation -->

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
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
                    'excel'
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
