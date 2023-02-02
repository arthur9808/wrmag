@extends('adminlte::page')

@section('title', 'Coaches')

@section('content_header')
    <h1>Edit Coach</h1>
@stop

@section('content')
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Create Coach</h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('/admin/coaches/'.$profile->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Enter First Name" required value="{{ $profile->f_name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="l_name">Last Name:</label>
                                    <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Enter Last Name" required value="{{ $profile->l_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Coach Email" value="{{ $profile->email }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Name of Academy:</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Name of Academy" value="{{ $profile->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Coach Phone" value="{{ $profile->phone }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter Coach City" value="{{ $profile->city }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="country">Country:</label>
                                    <input type="text" class="form-control" name="country" id="country" placeholder="Enter Coach Country" value="{{ $profile->country }}">
                                </div>
                            </div> --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter Coach State" value="{{ $profile->state }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="website">Coach Website Link:</label>
                                    <input type="text" class="form-control" name="website" id="website" placeholder="Enter Coach Website Link" value="{{ $profile->website }}">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="banner_title">Banner Title:</label>
                                    <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="Enter Banner Title" value="{{ $profile->banner_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio:</label>
                                    <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Enter Coach Bio">{{ $profile->bio }}</textarea>
                                </div>
                            </div>
                        </div>

                        
                        
                        <hr>

                        <h5>Social Media</h5>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook Link:</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Ex. https://www.facebook.com/quarterbackmagazine/" value="{{ $profile->facebook }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram Username:</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Ex. quarterbackmag" value="{{ $profile->instagram }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter Username:</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Ex. quarterbackmag" value="{{ $profile->twitter }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tiktok">TikTok Username:</label>
                                    <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="Ex. qbmag" value="{{ $profile->tiktok }}">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>Coach Logo</h5>
                        <label class="form-text text-muted">The logo must measure 54x54.</label>
                        @if($profile->coach_logo)
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="file"  name="coach_logo" id="coach_logo" placeholder="Enter Coach Image">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <img src="{{ asset('storage/'.$profile->coach_logo) }}" alt="{{ $profile->name }}" class="img-fluid" width="200">
                                </div>
                            </div>
                        @else
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="file"  name="coach_logo" id="coach_logo" placeholder="Enter Coach Image">
                                </div>
                            </div>
                        @endif

                        <hr>

                        <h5>Coach Image</h5>
                        @if($profile->image)
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <input type="file"  name="image" id="image" placeholder="Enter Coach Image">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <img src="{{ asset('storage/'.$profile->image) }}" alt="{{ $profile->name }}" class="img-fluid" width="200">
                                </div>
                            </div>
                        @else
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <input type="file"  name="image" id="image" placeholder="Enter Coach Image">
                                </div>
                        @endif
                        
                        <hr>
                        
                        <hr>

                        <h5>Upcoming Camps</h5>
                        <!-- Button to add new row -->
                        {{-- {{ dd($upcomingCamps); }} --}}
                        @for($i = 0; $i < count($upcomingCamps['date']); $i++)
                        <div class="add_upconming_camps row">
                            {{-- <div class="col-6">
                                <div class="form-group">
                                    <label for="upcoming_camps_name">Name Of Camp:</label>
                                    <input type="text" name="upcoming_camps_name[]" id="upcoming_camps_name" class="form-control" value="{{ $upcomingCamps['name'][$i] }}">
                                </div>
                            </div> --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="upcoming_camps_date">Date Of Camp:</label>
                                    <input type="date" name="upcoming_camps_date[]" id="upcoming_camps_date" class="form-control" value="{{ $upcomingCamps['date'][$i] }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="upcoming_camps_end_date">End Date Of Camp:</label>
                                    <input type="date" name="upcoming_camps_end_date[]" id="upcoming_camps_end_date" class="form-control" value="{{ $upcomingCamps['end_date'][$i] }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="upcoming_camps_location">Location Of Camp:</label>
                                    <input type="text" name="upcoming_camps_location[]" id="upcoming_camps_location" class="form-control" value="{{ $upcomingCamps['location'][$i] }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="upcoming_camps_link">Link Of Camp:</label>
                                    <input type="text" name="upcoming_camps_link[]" id="upcoming_camps_link" class="form-control" value="{{ $upcomingCamps['link'][$i] }}">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-lg btn-block mt-4" onclick="deleteRow(this)">Delete</button>
                                </div>
                            </div>
                        </div>
                        @endfor

                        <!-- Si $upcomingCamos está vacio -->
                        @if(count($upcomingCamps['date']) == 0)
                        <div class="add_upconming_camps row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="upcoming_camps_name">Name Of Camp:</label>
                                    <input type="text" name="upcoming_camps_name[]" id="upcoming_camps_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="upcoming_camps_date">Date Of Camp:</label>
                                    <input type="date" name="upcoming_camps_date[]" id="upcoming_camps_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="upcoming_camps_end_date">End Date Of Camp:</label>
                                    <input type="date" name="upcoming_camps_end_date[]" id="upcoming_camps_end_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="upcoming_camps_location">Location Of Camp:</label>
                                    <input type="text" name="upcoming_camps_location[]" id="upcoming_camps_location" class="form-control">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-lg btn-block mt-4" onclick="deleteRow(this)">Delete</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        

                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-primary" id="add_upcoming_row">Add New Row</a>
                            </div>
                        </div>

                        <hr>

                        <h5>College / NFL QBS Trained</h5>

                        @for($i = 0; $i < count($college_nfl_qbs_trained['name']); $i++)
                        <div class="add_college_nfl row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="college_nfl_qbs_trained_name">Name Of QB:</label>
                                    <input type="text" name="college_nfl_qbs_trained_name[]" id="college_nfl_qbs_trained_name" class="form-control" value="{{ $college_nfl_qbs_trained['name'][$i] }}">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="college_nfl_qbs_trained_college">College /NFL:</label>
                                    <input type="text" name="college_nfl_qbs_trained_college[]" id="college_nfl_qbs_trained_college" class="form-control" value="{{ $college_nfl_qbs_trained['college'][$i] }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-lg btn-block mt-4" onclick="deleteRow(this)">Delete</button>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <!-- Si $college_nfl_qbs_trained está vacio -->
                        @if(count($college_nfl_qbs_trained['name']) == 0)
                        <div class="add_college_nfl row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="college_nfl_qbs_trained_name">Name Of QB:</label>
                                    <input type="text" name="college_nfl_qbs_trained_name[]" id="college_nfl_qbs_trained_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="college_nfl_qbs_trained_college">College /NFL:</label>
                                    <input type="text" name="college_nfl_qbs_trained_college[]" id="college_nfl_qbs_trained_college" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-lg btn-block mt-4" onclick="deleteRow(this)">Delete</button>
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-primary" id="add_nfl_row">Add New Row</a>
                            </div>
                        </div>

                        <hr>

                        <h5>Featured Photos</h5>
                        <div class="row">
                            @foreach($featured_images as $coach_image)
                                <!-- Show featured images -->
                                {{-- <div class="col-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('storage/' . $coach_image) }}" class="img-fluid" alt="{{ $coach_image }}" width="40%">
                                        </div>
                                        <?php $image_name = str_replace('coaches/', '', $coach_image); ?>
                                        <div class="col-12 mt-2 mb-2">
                                            <a href="{{url('admin/coaches/'.$profile->id. '/' . $image_name . '/featured')}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                            
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-3 featured_image_cotent" style="background-image: url('{{ asset('storage/' . $coach_image) }}'); background-size: cover; background-position: center; height: 200px;">
                                <!-- Div trahs on hover -->
                                <?php $image_name = str_replace('coaches/', '', $coach_image); ?>
                                <a href="{{url('admin/coaches/'.$profile->id. '/' . $image_name . '/featured')}}" class="btn_trash btn btn-sm" onclick="return confirm('Are you sure you want to delete this image?')"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            @endforeach
                        </div>

                        
                        <div class="p-2">
                            
                            <div id="add_featued_images" class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="featued_images[]" id="featued_images" multiple>
                                    </div>
                                </div>
                                
                            </div>

                        </div>


                        <button type="submit" class="btn btn-success btn-lg btn-block mt-4">Update Coach</button>
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
<style>
    .gallery {
        display: flex;
        align-content: center;
        align-items: center;    
        justify-content: center;
    }

    .btn_trash {
        display: none;
        opacity: 0.9;
        width: 100%;
        height: 100%;
        background-size: cover;
        text-align: center;
        vertical-align: middle;
        background: #000; 
        font-size: 20px;
        padding: 80px;
        color: #fff;
        /*Centrar el texto del boton*/
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    /*Al hacer hover en featured_image_cotent, se muestra el elemento btn_trash*/
    .featured_image_cotent:hover .btn_trash {
        display: block;
        transition: all 0.5s ease; 
        color: #fff;
    }

</style>
@stop

@section('js')
<script>

    /* const add_featued_images_button = document.getElementById('add_featued_images_row');
    const add_featured_photos = document.getElementById('add_featued_images');
    add_featued_images_button.addEventListener('click', function () {
        console.log('Clonando');
        const new_add_featued_images = add_featured_photos.cloneNode(true);
        add_featured_photos.parentNode.insertBefore(new_add_featued_images, add_featued_images.nextSibling);
    }); */

    const add_nfl_row = document.getElementById('add_nfl_row');
    const add_college_nfl = document.getElementsByClassName('add_college_nfl');
    add_nfl_row.addEventListener('click', function () {
        const new_add_college_nfl = add_college_nfl[0].cloneNode(true);
        const inputs = new_add_college_nfl.getElementsByTagName('input');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
        add_college_nfl[add_college_nfl.length - 1].parentNode.insertBefore(new_add_college_nfl, add_college_nfl[add_college_nfl.length - 1].nextSibling);
        
    });

    const add_upcoming_row = document.getElementById('add_upcoming_row');
    const add_upconming_camps = document.getElementsByClassName('add_upconming_camps');
    add_upcoming_row.addEventListener('click', function () {
        const new_add_upconming_camps = add_upconming_camps[0].cloneNode(true);
        const inputs = new_add_upconming_camps.getElementsByTagName('input');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
        add_upconming_camps[add_upconming_camps.length - 1].parentNode.insertBefore(new_add_upconming_camps, add_upconming_camps[add_upconming_camps.length - 1].nextSibling);
    });

</script>

<script>
    function deleteRow(row) {
        var parent = row.parentNode.parentNode.parentNode;
        // Delete parent
        parent.parentNode.removeChild(parent);
    }
</script>


@stop