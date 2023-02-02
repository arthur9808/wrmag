@extends('adminlte::page')

@section('title', 'Create Profile')

@section('content_header')
    <h1>Create Profile</h1>
@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Profile</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('/admin/profiles/') }}" method="POST">
                                @csrf
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
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="f_name">First Name:</label>
                                            <input type="text" class="form-control" name="f_name" id="f_name"
                                                placeholder="Enter First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="l_name">Last Name:</label>
                                            <input type="text" class="form-control" name="l_name" id="l_name"
                                                placeholder="Enter Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" name="qb_email" id="qb_email"
                                                placeholder="email@email.com" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-block"
                                    onclick="return confirm('When creating the profile, an email will be sent to the user with the account details and a confirmation email. By creating the profile, you also indicate that you accept the terms of use. Are you sure you want to create this profile?')">Create
                                    Profile</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@stop

@section('css')
@stop

@section('js')

@stop
