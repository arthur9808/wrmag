@extends('adminlte::page')

@section('title', 'Edit Membership')

@section('content_header')
    <h1>Edit Membership</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Membership</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    Only membership benefits can be upgraded
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('/admin/memberships/'.$membership->id) }}" method="POST">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Coach Name" value="{{ $membership->name }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Coach Email" value="{{ $membership->title }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Coach Title" value="{{ $membership->description }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Coach Phone" value="{{ $membership->price }}" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="interval_membership">Interval</label>
                                        <select name="interval_membership" id="interval_membership" class="form-control" disabled>
                                            <option value="month" {{ $membership->interval_membership == 'month' ? 'selected' : '' }}>1 Month</option>
                                            <option value="year" {{ $membership->interval_membership == 'year' ? 'selected' : '' }}>12 Months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="previous_price">Previous Price</label>
                                        <input type="text" class="form-control" name="previous_price" id="previous_price" placeholder="Enter Coach Phone" value="{{ $membership->previous_price }}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="popular">Popular:</label>
                                        <div class="form-check">
                                            <!-- If is popular, then checked -->
                                            <input type="checkbox" class="form-check-input" name="popular" id="popular" value="1" {{ $membership->popular == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>

                            <h5>Benefits</h5>

                            <!-- Show all benefits in radio buttons and check them if they are already in the membership -->
                            @foreach($benefits as $benefit)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="benefits[]" value="{{ $benefit->id }}" id="{{ $benefit->id }}" {{ $membership->benefits->contains($benefit->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $benefit->id }}">
                                        {{ $benefit->name }}
                                        @if($benefit->is_shared)
                                            <span class="badge badge-success">Check this option if this benefit is for more than one membership</span>
                                        @endif
                                    </label>
                                </div>
                            @endforeach

                            <hr>

                            <button type="submit" class="btn btn-success btn-lg btn-block">Update Membership</button>
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