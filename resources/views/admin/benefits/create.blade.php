@extends('adminlte::page')

@section('title', 'Create Benefits')

@section('content_header')
    <h1>Create Benefit</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Create Benefit</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/benefits') }}" method="POST">
                        @csrf
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
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Benefit Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Benefit Description">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <!-- Check Box -->
                                    <label for="is_active">Check this option if this benefit is for more than one membership:</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_shared" id="is_shared" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Create Benefit</button>
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