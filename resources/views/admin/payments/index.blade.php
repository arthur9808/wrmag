@extends('adminlte::page')

@section('title', 'Payments')

@section('content_header')
    <h1>Payments</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payments</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append">
                                        {{-- <a href="{{url('/admin/payments/create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Membership</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Messages to delete -->
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Member Name</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Start Date</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->profile->f_name . ' ' . $payment->profile->l_name }}</td>
                                            <td>{{ $payment->description }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->start_date }}</td>
                                            <td>
                                                <a href="{{ url('admin/payments/' . $payment->id) }}"
                                                    class="btn btn-sm btn-default"><i class="fa fa-eye"></i> View</a>
                                            </td>
                                            {{-- <td>
                                <form action="{{ url('admin/payments/'.$payment->id) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('Do you want to remove this Payment?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Trash</button>
                                </form>
                            </td> --}}
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
