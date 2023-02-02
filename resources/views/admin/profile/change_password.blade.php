@extends('adminlte::page')

@section('title', 'Edit Benefits')

@section('content_header')
    <h1>Update Profile</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Update Profile</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/profile/change-password') }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <!-- Session Flash Message -->
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="old_password">Old Password:</label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="old_password" id="old_password" required>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="new_password" id="new_password" required>
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Update Password</button>
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