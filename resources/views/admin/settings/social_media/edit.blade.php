@extends('adminlte::page')

@section('title', 'Coaches')

@section('content_header')
    <h1>Edit Coach</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Edit Coach</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/settings/social-media/'.$social_media->id) }}" method="POST">
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Social Medina:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $social_media->name }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="value">URL:</label>
                                    <input type="url" class="form-control" name="value" id="value" value="{{ $social_media->value }}" required>
                                </div>
                                
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Update Social Media</button>
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