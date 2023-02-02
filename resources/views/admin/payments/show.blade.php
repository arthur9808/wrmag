@extends('adminlte::page')

@section('title', 'View Payment')

@section('content_header')
    <h1>View Payment</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">View Payment</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
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
                                        <label for="method">Method:</label>
                                        <input type="text" class="form-control" name="method" id="method" value="{{ $payment->method }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <input type="text" class="form-control" name="status" id="status" value="{{ $payment->status }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="text" class="form-control" name="amount" id="amount" value="{{ $payment->amount }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{ $payment->description }}" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="text" class="form-control" name="start_date" id="start_date" value="{{ $payment->start_date }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="text" class="form-control" name="end_date" id="end_date" value="{{ $payment->end_date }}" readonly required>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Profile Information</h5>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $payment->profile->f_name }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="qb_email">QB Email</label>
                                        <input type="text" class="form-control" name="qb_email" id="qb_email" value="{{ $payment->profile->qb_email }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $payment->profile->l_name }}" required readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $payment->profile->phone }}" required readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Membership Information</h5>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first_name">Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $payment->membership->name }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="qb_email">Stripe Name</label>
                                        <input type="text" class="form-control" name="qb_email" id="qb_email" value="{{ $payment->membership->stripe_name }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="qb_email">Title</label>
                                        <input type="text" class="form-control" name="qb_email" id="qb_email" value="{{ $payment->membership->title }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Description</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $payment->membership->description }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Price</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $payment->membership->price }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="qb_email">Previous Price</label>
                                        <input type="text" class="form-control" name="qb_email" id="qb_email" value="{{ $payment->membership->previous_price }}" required readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="{{ url('admin/payments') }}" class="btn btn-success btn-lg btn-block">Back to Payments</a>
                            <div class="form-group mt-4">
                                <a href="" class="btn btn-success btn-lg btn-block">View Payment in Stripe</a>
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