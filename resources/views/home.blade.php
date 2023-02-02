@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_profiles }}</h3>
                <p>Profiles</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/profiles') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total_coaches }}</h3>
                <p>Coaches</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('admin/coaches') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total_memberships }}</h3>
                <p>Memberships</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('admin/memberships') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total_payments }}</h3>
                <p>Paid Profiles</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('admin/payments/profiles') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Latest Coaches</h3>
                    <a href="{{ url('admin/coaches') }}">View Coaches</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($coaches as $coach)
                            <tr>
                                <th scope="row">{{ $coach->f_name .' '. $coach->l_name }}</th>
                                <td>{{ $coach->email }}</td>
                                <td>{{ $coach->phone }}</td>
                            </tr>        
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Latest Profiles</h3>
                    <a href="{{ url('admin/profiles') }}">View Profiles</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <th scope="row">{{ $profile->f_name  . ' ' . $profile->l_name}}</th>
                                <td>{{ $profile->qb_email }}</td>
                                <td>{{ $profile->username }}</td>
                            </tr>        
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop