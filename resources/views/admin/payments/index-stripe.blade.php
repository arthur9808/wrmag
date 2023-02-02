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
                            <th>Stripe ID</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Refunded</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td> @if($payment->status == 'succeeded')
                                <span class="badge badge-success">{{ $payment->status }}</span>
                            @elseif($payment->status == 'pending')
                                <span class="badge badge-warning">{{ $payment->status }}</span>
                            @elseif($payment->status == 'failed')
                                <span class="badge badge-danger">{{ $payment->status }}</span>
                            @elseif($payment->status == 'canceled')
                                <span class="badge badge-danger">{{ $payment->status }}</span>
                            @endif
                            </td>
                            <td>
                                @if($payment->profile)
                                    <a href="">{{ $payment->profile->f_name }} {{ $payment->profile->l_name }}</a>
                                @else
                                    <span class="text-muted">Profile Not Found</span>
                                @endif
                            </td>
                            <td>
                                @if($payment->charges->data[0]->refunded)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif
                            </td>
                            <td>${{ ($payment->amount/100) }}</td>
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