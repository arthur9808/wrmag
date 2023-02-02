@extends('adminlte::page')

@section('title', 'Create Memberships')

@section('content_header')
    <h1>Create Membership</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Create Membership</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/memberships') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Ex. BEGINNER" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Membership Title" required>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="interval_membership">Interval</label>
                                    <select class="form-control" name="interval_membership" id="interval_membership" required>
                                        <option value="">Select Interval</option>
                                        <option value="month">1 Month</option>
                                        <option value="year">12 Months</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Ex. Profile, Twitter">
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="Ex. 16.99" required>
                                    {{-- <input type="number" class="form-control" name="price" id="price" placeholder="Ex. 16.99" required> --}}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="popular">Popular:</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="popular" id="popular" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="previous_price">Previous Price</label>
                                    <input type="number" step="0.01" class="form-control" name="previous_price" id="previous_price" placeholder="Ex. 20.00" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5>Benefits</h5>

                        <!-- Show all benefits in radio buttons -->
                        @foreach($benefits as $benefit)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="benefits[]" value="{{ $benefit->id }}">
                                <label class="form-check-label">{{ $benefit->name }}</label>
                            </div>
                        @endforeach

                        <hr>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Create Membership</button>
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