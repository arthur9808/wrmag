@extends('adminlte::page')

@section('title', 'Edit Universities')

@section('content_header')
    <h1>Edit University</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Edit University</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/universities/'.$university->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $university->name }}" placeholder="Enter University Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $university->email }}" placeholder="Enter University Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ $university->address }}" placeholder="Enter University Address">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $university->phone }}" placeholder="Enter University Phone">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image">University Logo:</label>
                                    <input type="file" class="form-control-file" id="logo" name="logo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    @if($university->logo)
                                    <img src="{{ asset('storage/'.$university->logo) }}" alt="{{ $university->name }}"  width="200px" height="200px">
                                    {{-- <img src="{{ asset('storage/'.$university->logo) }}" alt="{{ $university->name }}" width="100px" height="100px"> --}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Update University</button>
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