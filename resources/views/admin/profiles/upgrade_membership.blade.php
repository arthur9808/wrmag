@extends('adminlte::page')

@section('title', 'Upgrade Profile')

@section('content_header')
    <h1>Update Membership @if($is_paid)with payment via user card @endif </h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">{{ $profile->f_name . ' ' . $profile->l_name }}</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/profiles/' . $profile->id . '/upgrade') }}" method="POST">
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
                            <h5>Profile Information</h5>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="f_name">Name:</label>
                                    <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Enter First Name" value="{{ $profile->f_name . ' ' . $profile->l_name }}" readonly>
                                    <input type="hidden" name="is_paid" value="@if($is_paid){{ 1 }}@else{{ 0 }}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="l_name">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $profile->qb_email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h5>Profile Memberhsip</h4>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <!--Mememberhsip Name-->
                                <div class="form-group">
                                    <label for="membership_name">Membership Name:</label>
                                    <input type="text" class="form-control" name="membership_name" id="membership_name" placeholder="Enter Membership Name" value="{{ $membership->name }}" readonly>
                                </div>

                            </div>
                            <div class="col-6">
                                <!--Mememberhsip Price-->
                                <div class="form-group">
                                    <label for="membership_price">Membership Price:</label>
                                    <input type="text" class="form-control" name="membership_price" id="membership_price" placeholder="Enter Membership Price" value="{{ $membership->price }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h5>Memberhsip Upgrade</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!--Select with memberships-->
                                <div class="form-group">
                                    <label for="membership_id">Select the membership you want to upgrade :</label>
                                    <select class="form-control" name="membership_upgrade_id" id="membership_upgrade_id">
                                        @foreach($memberships as $membership)
                                            <option value="{{ $membership->id }}">{{ $membership->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- @if($profile->stripe_customer_id)
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>WARNING!</strong> <br>
                                    This profile has <strong>a card and your membership registered with Stripe</strong>, if you upgrade the membership, your monthly payments will keep the price of the previous membership.
                                </div>
                            </div>
                            
                        </div>
                        @endif --}}
                        @if($is_paid)
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>WARNING!</strong> <br>
                                    This profile has <strong>a card and your membership registered with Stripe</strong>, if you upgrade the membership, your monthly payments will be updated to the cost of the membership you selected and the user will be notified via email.
                                </div>
                            </div>
                        </div>
                        @elseif(!$is_paid && $profile->stripe_customer_id)
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>WARNING!</strong> <br>
                                    This profile has <strong>a card and your membership registered with Stripe</strong>, if you upgrade the membership, your monthly payments will keep the price of the previous membership.
                                </div>
                            </div>
                            
                        </div>
                        @endif
                        <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return confirm('Are you sure you want to upgrade this profile?')">Upgrade Profile @if($is_paid)With Payment @endif</button>
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