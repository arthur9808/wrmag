@extends('adminlte::page')

@section('title', 'Coaches')

@section('content_header')
    <h1>Social Media</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Social Media</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            {{-- <a href="{{url('/admin/coaches/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Coach</a> --}}
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <!-- Messages to delete -->
                @if(session('success'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    </div>
                </div>
                @endif
                @if(session('error'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    </div>
                </div>
                @endif
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($social_media as $link)
                        <tr>
                            <td>{{$link->name}} </td>
                            <td>{{$link->value}}</td>
                            <td>
                            <a href="{{url('admin/settings/social-media/'.$link->id.'/edit')}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    
@stop

@section('js')

@stop