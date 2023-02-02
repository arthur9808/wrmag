@extends('adminlte::page')

@section('title', 'Coaches')

@section('content_header')
    <h1>Coaches</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Coaches</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{url('/admin/coaches/create')}}" class="btn btn-sm btn-success mr-4"><i class="fa fa-plus"></i> Add Coach</a>
                                <!-- Order Coach -->
                                <a href="{{url('/admin/coaches/sort')}}" class="btn btn-sm btn-primary"><i class="fa fa-sort"></i> Order Coaches</a>
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
                            <th>Email</th>
                            <th>Actions</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coaches as $coach)
                        <tr>
                            <td> 
                                {{ $loop->iteration }} 
                            </td>
                            <td>{{$coach->f_name.' ' . $coach->l_name}} </td>
                            <td>{{$coach->email}}</td>
                            <td>
                            <a href="{{url('admin/coaches/'.$coach->id.'/edit')}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                <!-- View Coach -->
                                <a href="{{url('coach/'.$coach->id)}}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                            </td>
                            <td>
                            <form action="{{ url('admin/coaches/'.$coach->id) }}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" onclick="return confirm('Do you want to remove this Coach?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Trash</button>
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