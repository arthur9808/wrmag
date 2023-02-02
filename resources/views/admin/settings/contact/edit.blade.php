@extends('adminlte::page')

@section('title', 'Coaches')

@section('content_header')
    <h1>Edit Contact Mail</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Edit Contact Mail</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/settings/contact-form/'.$settings->id) }}" method="POST">
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
                            <?php
                                $mails = json_decode($settings->value);
                                $value = '';
                            
                                foreach($mails as $mail){
                                    $value .= $mail.',';
                                }

                                $value = substr($value, 0, -1);

                            ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="value">Emails (separated by comma):</label>
                                    <textarea class="form-control" name="value" id="value" cols="30" rows="10">{{ $value }}</textarea>
                                    {{-- <input type="text" class="form-control" name="value" id="value" value="{{ $settings->value }}" placeholder=""> --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Update Email</button>
                                </div>
                            </div>
                        </div>

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