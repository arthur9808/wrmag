@extends('adminlte::page')

@section('title', 'Contact Form')

@section('content_header')
    <h1>Contact Form</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Contact Form</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            {{-- <a href="{{url('/admin/coaches/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Update Contact Mail</a> --}}
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
                <?php
                    $mails = json_decode($settings->value);
                    $value = '';
                
                    foreach($mails as $mail){
                        $value .= $mail.',';
                    }

                    $value = substr($value, 0, -1);

                ?>
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$value}}</td>
                            <td>
                                <a href="{{url('admin/settings/contact-form/'.$settings->id.'/edit')}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
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