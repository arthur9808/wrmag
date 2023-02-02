@extends('adminlte::page')

@section('title', 'Create Profile')

@section('content_header')
    <h1>Edit Profile</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <form action="{{ url('/admin/benefits'. $profile->id) }}" method="POST">
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
                                    <label for="f_name">First Name:</label>
                                    <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Enter First Name" value="{{ $profile->f_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">QN Recruit's Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com" value="{{ $profile->l_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="San Diego, CA" value="{{ $profile->city }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="select_1">Select:</label>
                                    <select class="form-control" name="select_1" id="select_1">
                                        <option value="">Dual Threat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Recruiting Class Of:</label>
                                    <input type="text" class="form-control" name="" id="" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Select University:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">San Diego State University</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">QB Coach's Mobile:</label>
                                    <input type="text" class="form-control" name="" id="" placeholder="" required>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="l_name">Last Name:</label>
                                    <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Your Phone Number:</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="(123) 456 7890" required>
                                </div>
                                <div class="form-group">
                                    <label for="select_2">Select:</label>
                                    <select class="form-control" name="select_2" id="select_2">
                                        <option value="">Quarterback</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">College Recruiting Status:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Please Select</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">QB Coach's Name:</label>
                                    <input type="text" class="form-control" name="" id="" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="">QB Coach's Email:</label>
                                    <input type="email" class="form-control" name="" id="" placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Biography</label>
                                    <textarea class="form-control" name="biography" id="biography" rows="3" placeholder="Enter Biography"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                        <h5>Social Media</h5>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Facebook:</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="https://www.facebook.com/">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter:</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="https://www.twitter.com/">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Instagram:</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="https://www.instagram.com/">
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook:</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="https://www.linkedin.com/">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>Prospect Info</h5>

                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Height:</label>
                                    <input type="text" class="form-control" name="height" id="height" placeholder="6'2">
                                </div>
                                <div class="form group">
                                    <label for="">Weight:</label>
                                    <input type="text" class="form-control" name="weight" id="weight" placeholder="200 lbs">
                                </div>
                                <div class="form group">
                                    <label for="">Feet Size:</label>
                                    <input type="text" class="form-control" name="feet_size" id="feet_size" placeholder="11">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Current GPA:</label>
                                    <input type="text" class="form-control" name="gpa" id="gpa" placeholder="99">
                                </div>
                                <div class="form-group">
                                    <label for="">Arm Lenght:</label>
                                    <input type="text" class="form-control" name="arm_length" id="arm_length" placeholder="99">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Hand Size:</label>
                                    <input type="text" class="form-control" name="hand_size" id="hand_size" placeholder="9 3/8">
                                </div>
                                <div class="form-group">
                                    <label for="">Wing Span:</label>
                                    <input type="text" class="form-control" name="wing_span" id="wing_span" placeholder="74 1/2">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>Performance Stats</h5>

                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">40 Yard Dash:</label>
                                    <input type="text" class="form-control" name="dash" id="dash" placeholder="6' 1''">
                                </div>
                                <div class="form-group">
                                    <label for="">Brench Press:</label>
                                    <input type="text" class="form-control" name="brench_press" id="brench_press" placeholder="170 lbs">
                                </div>
                                <div class="form group">
                                    <label for="">20-Yard Shuttle:</label>
                                    <input type="text" class="form-control" name="shuttle" id="shuttle" placeholder="11">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Strength Squat:</label>
                                    <input type="text" class="form-control" name="squat" id="squat" placeholder="99">
                                </div>
                                <div class="form-group">
                                    <label for="">Vertical Jump:</label>
                                    <input type="text" class="form-control" name="vertical_jump" id="vertical_jump" placeholder="99">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Broad Jump</label>
                                    <input type="text" class="form-control" name="broad_jump" id="broad_jump" placeholder="9 3/8">
                                </div>
                                <div class="form-group">
                                    <label for="">Three-Cone Drill:</label>
                                    <input type="text" class="form-control" name="three_cone_drill" id="three_cone_drill" placeholder="74 1/2">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>College Offers + Commits</h5>
                        

                        <button type="submit" class="btn btn-success btn-lg btn-block">Create Profile</button>
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