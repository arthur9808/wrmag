@extends('adminlte::page')

@section('title', 'Universities')

@section('content_header')
    <h1>Universities</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Universities</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{url('/admin/universities/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add University</a>
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($universities as $university)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>{{$university->name}} </td>
                            <td>
                            <a href="{{url('admin/universities/'.$university->id.'/edit')}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                            <form action="{{ url('admin/universities/'.$university->id) }}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" onclick="return confirm('Do you want to remove this University?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Trash</button>
                            </form>
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