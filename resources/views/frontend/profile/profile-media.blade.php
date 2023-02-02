@extends('layouts.frontend')
@section('title', 'WRMag - Media Profile')
@section('content')

<section id="media_section" class="about_media">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12 left_proiless">
                <div class="img_box" onclick="window.location.href='{{ url('profile-about/'.$profile->slug) }}'">
                    <a href="{{ url('profile-about/'.$profile->slug) }}"> <img src="{{ asset('template/assets/img/player 3.png') }}" alt=""></a>
                    <p>About</p>
                    {{-- @if($section_locked) 
						<br>
                    @endif --}}
                </div>
                <div class="img_box" onclick="window.location.href='{{ url('profile-performance/'.$profile->slug) }}'">
                    <a href="{{ url('profile-performance/'.$profile->slug) }}"><img src="{{ asset('template/assets/img/football 1.png') }}" alt=""></a>
                    <p>
                        Performance
                        {{-- @if($section_locked) 
                        <!-- UPGRADE BADGE -->
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                        @endif --}}
                    </p>
                </div>
                <div class="img_box" onclick="window.location.href='{{ url('profile-academic/'.$profile->slug) }}'">
                    <a href="{{ url('profile-academic/'.$profile->slug) }}"><img src="{{ asset('template/assets/img/Graduation Cap 1.png') }}" alt=""></a>
                    <p>
                        Academic
                        
                        {{-- @if($section_locked) 
                        <!-- UPGRADE BADGE -->
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                        @endif --}}
                    </p>
                </div>
                <div class="img_box_last" onclick="window.location.href='{{ url('profile-media/'.$profile->slug) }}'">
                    <a href="{{ url('profile-media/'.$profile->slug) }}"> <img src="{{ asset('template/assets/img/Artboard 1 1.png') }}" alt=""></a>
                    <p>
                        Media
                        {{-- @if($section_locked) 
                        <!-- UPGRADE BADGE -->
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                        @endif --}}
                    </p>
                </div>
                <!-- NEW LEFT MENU -->
                @if($profile->membership->name == 'BEGINNER' || $profile->membership->name == 'PRACTICE SQUAD')
                <div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
                    <a href="{{ url('memberships') }}"> <img
                            src="{{ asset('template/assets/img/IGiconos.png') }}" alt=""></a>
                    <p class="menu_blocked">
                        Instagram Exposure
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                    </p>
                </div>
                @endif
                @if($profile->membership->name == 'BEGINNER')
                <div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
                    <a href="{{ url('memberships') }}"> <img
                            src="{{ asset('template/assets/img/MAGAZINE-iconos.png') }}" alt=""></a>
                    <p class="menu_blocked_magazine">
                        Featured in Digital Magazine
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                    </p>
                </div>
                <div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
                    <a href="{{ url('memberships') }}"> <img
                            src="{{ asset('template/assets/img/TWiconos.png') }}" alt=""></a>
                    <p class="menu_blocked">
                        Twitter Exposure
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                    </p>
                </div>
                @endif
                @if($profile->membership->name == 'BEGINNER' || $profile->membership->name == 'PRACTICE SQUAD')
                <div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
                    <a href="{{ url('memberships') }}"> <img
                            src="{{ asset('template/assets/img/SHOPiconos.png') }}" alt=""></a>
                    <p class="menu_blocked">
                        Exclusive Merch
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                    </p>
                </div>
                @endif
                <!-- END NEW LEFT MENU -->
            </div>
            <div class="col-xl-10 col-lg-10 col-sm-12 col-xs-12 about_right">
                <div class="complete_profile">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 title_complete">
                            <h3>Complete your QB Profile</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="squad_sec">
                                <span class="squad">{{ $membership->name }} MEMBERSHIP</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="drag_files">
                    <div class="row" id="help_message">
                        <h4 class="featured_photos">Please e-mail <a class="issues_mail" href="catch@wrmag.com">catch@wrmag.com</a> for any issues</h3>
                    </div>
                    <div class="top_space">
                        <h3 class="featured_photoss">Photos</h3>
                    </div>
                    <form action="{{ url('/profile-media') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
                        <div class="upload_files">
                            @csrf
                            <div class="dz-default dz-message" >
                                <div class="grey_bg">
                                    <h5>Drag Files to upload</h5>
                                    <span>(.png, .jpg)</span>
                                </div>
                                <button class="bttn_red" type="button">or browse files</button>
                            </div>
                        </div>
                    </form>
                </div>
                <form action="{{ url('/profile-media-data') }}" method="POST">
                    @csrf
                    <!-- Input Hidden for Profile ID -->
                    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                    <div class="save_files">
                        <div id="messages_order">
                            <p class="drag_photos">Drag photos to change order</p>
                        </div>
                        <div class="row drang_and_drop" id="photos_profile">
                            {{-- <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12 drag_bg">
                                <a href="#"> <img src="{{ asset('template/assets/img/Group 2185.png') }}" alt=""></a>
                            </div> --}}
                        </div>
                        <?php
                            $media_highlights = array(
                                'highlights' => json_decode($media->media_highlights_youtube_video_Link),
                            );
                        ?>
                        <div class="row">
                            <!-- Alert to show messages -->
                            <div id="messages">
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                </div>
                                @endif
                                @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                </div>
                                @endif
                            </div>
                            <!-- End Alert to show messages -->
                        </div>
                        <hr>
                        <div class="top_space" id="featured_photos_title">
                            <h3 class="featured_photoss">Media Highlights</h3>
                        </div>
                        <div id="media_h_msg">

                        </div>
                        <div class="form-row fst_row third_row highlights_content">
							<div class="form-group inputtt col-12">
                                <p class="instructions" style="text-align: center; color:#000;"> 
                                    Insert your YOUTUBE or HUDL link for each row
                                    <br><br>
                                </p>
                                <p class="instructions" style="text-align: left; color:#000;"> 
                                    Example: https://www.youtube.com/watch?v=Ou26hHsq-FQ
                                    <br>
                                    Example: https://www.hudl.com/video/3/10763734/61d63389b023760f00328861
                                    <br> <br>
                                </p>
                                <!-- Alert for the user if they have not filled out all the fields -->
                                <div class="alert alert-danger" role="alert" id="alert_videos">
                                    <h3>IF YOUR HUDL LINK ISN'T WORKING, <a href="https://www.youtube.com/watch?v=AlGMjdUJWwk" target="_blank" style="text-transform: uppercase; color:#2DC810;">WATCH THIS VIDEO</a></h3>
                                </div>
							</div>
							<div class="form-group inputtt col-4">
							</div>
						</div>
                        <div class="form-group inputt col-md-12">
                            @for($i = 0; $i < count($media_highlights['highlights']); $i++)
                            <div id="youtuube_link_video" class="form-row fst_row third_row">
                                <div class="form-group inputtt col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="url" class="form-control link_video" placeholder="Ex. https://www.youtube.com/watch?v=S0Wiz_6K6lY" value="{{ $media_highlights['highlights'][$i] }}" name="media_highlights_youtube_video_Link[]">
                                </div>
                                <div class="form-group inputtt col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <!-- Delete Button -->
                                    <button type="button" class="btn btn-danger btn-sm btn_trash" onclick="delete_college_offers(this)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @endfor
                            
                            <div id="add_media_highlights" class="add" style="cursor: pointer;">
                                <i class="fas fa-plus"></i>Add Another Link
                            </div>
                        </div>
                        <div id="pro_day_future">
                            <hr>
                            <div class="top_space" id="pro_day_featured_video_title">
                                <h3 class="featured_photoss">Pro Day Feature Video</h3>
                            </div>
                            <div class="form-group inputt col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="video">Youtube video Link</label>
                                <input type="input" class="form-control" id="input_link" {{-- placeholder="Ex. https://www.youtube.com/watch?v=S1Wxy_6K6lY" --}} value="{{ $media->pro_day_feature_video_youtube_video_link }}" name="pro_day_feature_video_youtube_video_link">
                            </div>
                        </div>
                        <div id="throwing_mechanic_feature_video">
                            <hr>
                            <div class="top_space" id="throwing_mechanic_feature_video_title">
                                <h3 class="featured_photoss">Throwing Mechanic Feature Video</h3>
                            </div>
                            <div class="form-group inputt col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="video">Youtube video Link</label>
                                <input type="input" class="form-control" id="input_link_two" {{-- placeholder="Ex. https://www.youtube.com/watch?v=A5Wkz_6K6lY" --}} value="{{ $media->throwing_mechanic_feature_video_youtube_video_link }}" name="throwing_mechanic_feature_video_youtube_video_link">
                            </div>
                        </div>
                        <br>
                        <!-- Alert for the user if they have not filled out all the fields -->
                        <div class="alert alert-danger" role="alert" id="alert_user">
                            <h1>Please click SAVE to update your LIVE profile</h1>
                            <br><br>
                            <h3>If you do not click save, your changes will not be saved.</h3>
                            <h3>Support issues email <a class="issue_alert" href="mailto:catch@wrmag.com">catch@wrmag.com</a></h3>
                        </div>
                        <br>
                        <div class="row mt-4">
                            <div class="academic_btn">
                                <button class="appointment-btn scrollto" style="border: none;">SAVE</button>
                                <a class="appointment-btn scrollto" style="margin-top: 30px;" href="{{ url('profile/'.$profile->slug) }}" target="_blank">VIEW PROFILE</a>
                                <a class="appointment-btn scrollto" style="margin-top: 30px;" id="copy_profile_link" onclick="copySlug('{{ url('profile/'.$profile->slug) }}')">COPY PROFILE LINK</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="asd" style="display: none">{{ $permissions['drag_files'] }}</div>
</section>


@endsection

@section('css')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.css" integrity="sha512-+Vla3mZvC+lQdBu1SKhXLCbzoNCl0hQ8GtCK8+4gOJS/PN9TTn0AO6SxlpX8p+5Zoumf1vXFyMlhpQtVD5+eSw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
<style>
    .dropzone {
        min-height: 150px;
        border: 2px solid #fff;
        background: white;
        padding: 20px 0px;
    }

    .dz-started {
        border: 2px solid #2DC810;
    }

    .drag_files_bg {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 50vh;
    }

    a.btn, button.btn {
		border: 2px solid #2DC810;
		background: #2DC810;
	}

	input[type="date"]:not(.has-value):before{
		color: #000;
		content: attr(placeholder);
	}

    #upgrade_btn {
		font-size: 14px;
		padding: 5px 15px;
		margin-left: 100px;
	}

    @media (max-width: 767px) {

        .appointment-btn {
            width: 100%;
        }

        .grey_bg {
            padding: 50px !important;
        }

        .complete_profile h3, .top_space h3 {
            font-size: 18px !important;
        }

        #drag_files > div {
            margin-top: 20px;
        }

        .dropzone {
            padding: 0px 0px;
        }
    }

    .academic_btn {
        justify-content: center;
        align-items: center;
    }

    #drag_files > div > h3, #featured_photos_title > h3 {
        background-color: #2DC810;
        padding: 6px;
        color: #fff !important;
    }

    #pro_day_featured_video_title > h3, #throwing_mechanic_feature_video_title > h3 {
        background-color: #fac123;
        padding: 6px;
    }

    .video_link_class span {
        color:#000 !important; 
    }

    .highlights_content {
        margin-top: 40px !important;
    }

    .instructions {
        color: #2DC810;
        padding-bottom: 0px;
        margin-bottom: 0px;
        /* padding-left: 16px; */
        font-size: 16px;
        font-weight: 600;
    }
</style>
@stop

@section('js')
<!-- Libraray JS Files -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<!-- End Libraray JS Files -->
<script>
    function copySlug(text) {
        var text = text
        navigator.clipboard.writeText(text).then(function() {
        console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
        console.error('Async: Could not copy text: ', err);
        });
    }
</script>
<script>
	function delete_college_offers(offer) {
		offer.parentNode.parentNode.remove();
	}
</script>
<!-- Media Highlights -->
<script>
    const add_media_highlights = document.getElementById('add_media_highlights');
    const media_highlights = document.getElementById('youtuube_link_video');
    let media_highlights_permission = '{{ $permissions['media_highlights'] }}';
    let has_media_highlights = '{{ $permissions['has_media_highlights'] }}';
    let media_highlights_permission_number = parseInt(media_highlights_permission);
    let has_media_highlights_number = parseInt(has_media_highlights);


    add_media_highlights.addEventListener('click', function () {
        if(has_media_highlights_number < media_highlights_permission_number) {

            const new_media_highlights = media_highlights.cloneNode(true);
            const inputs = new_media_highlights.getElementsByTagName('input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }
            const link_videos = document.querySelectorAll('#youtuube_link_video');
            link_videos[link_videos.length - 1].parentNode.insertBefore(new_media_highlights, link_videos[link_videos.length - 1].nextSibling);
            has_media_highlights_number = has_media_highlights_number + 1

        } else {
            const media_h_msg = document.getElementById('media_h_msg');     
            const alert = document.createElement('div');
            alert.classList.add('alert', 'alert-danger');
            alert.innerHTML = 'You can not add more than ' + media_highlights_permission_number + ' media highlights';
            media_h_msg.appendChild(alert);
            setTimeout(function () {
                alert.remove();
            }, 3000);
        }       
        
    });
</script>
<!-- End Media Highlights -->

<!-- -->
<script>
    const messages_order = document.getElementById('messages_order');
    Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
    maxFilesize: 50, // Tamaño máximo en MB
    maxFiles: 1, // Número máximo de imágenes
    init: function () {
        this.on("success", function (file, response) {
            console.log(response);
            if(response.error) {
                const alert = document.createElement('div');
                alert.classList.add('alert', 'alert-danger');
                alert.innerHTML = response.error;
                messages_order.appendChild(alert);
                setTimeout(function () {
                    alert.remove();
                }, 3000);
            } else {
                const alert = document.createElement('div');
                alert.classList.add('alert', 'alert-success');
                alert.innerHTML = 'Image uploaded successfully, the page will automatically reload to save the changes';
                messages_order.appendChild(alert);
                setTimeout(function () {
                    alert.remove();
                }, 2000);

                window.location.reload();
            }
        });
        this.on("addedfile", function () {
            this.element.classList.remove("dz-default");
            this.element.classList.add("dz-started");
        });
        
    }
};
</script>


<!-- Drag Files -->
<script>
    const user_id = {{ $profile->id }};
    const user_photos = document.getElementById('user_photos');
    const photos_profile = document.getElementById('photos_profile');

    fetch('{{ url('get-profile-media/'.$profile->id) }}')
        .then(response => response.json())
        .then(photos => {
            json_decode = JSON.parse(photos['data']);
            if(json_decode != null){
                json_decode.sort(function(a, b) {
                    return a.sort_order - b.sort_order;
                });
                console.log(json_decode);
                if(json_decode[0] != null) {
                photos_profile.innerHTML = '';
                    json_decode.forEach(photo => {

                        photos_profile.innerHTML += `
                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12 drag_bg" data-image-name="${photo.image_name}" style = "cursor: pointer; background-image: url('{{ asset('storage/') }}/${photo.image_path}')">
                                    <a href="${photo.image_name}"> <img src="{{ asset('template/assets/img/Group 2185.png') }}" alt=""></a>
                            </div>
                            
                        `;

                        photos_profile.querySelectorAll('a').forEach(element => {
                            element.addEventListener('click', function (e) {
                                e.preventDefault();
                                const image_name = element.getAttribute('href');
                                deletePhotoFunction(image_name);
                            });
                        });
                        
                    });
                }
                
            }
        });

        const deletePhotoFunction = (image_name) => {
            const delete_photo_url = `{{ url('delete-profile-media/${image_name}') }}`;
            fetch(delete_photo_url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if(data.success){
                    photos_profile.querySelector(`[data-image-name="${image_name}"]`).remove();

                }
            });
            
        }
</script>
<!-- End Drag Files -->

<!-- Sort Photos -->
<script>
    const sortable = new Sortable(photos_profile, {
        group: 'shared',
        animation: 150,
        ghostClass: 'blue-background-class',
        onAdd: function (evt) {
            const image_name = evt.item.getAttribute('data-image-name');
            const url = `{{ url('sort-profile-media') }}`;
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    image_name: image_name,
                    user_id: user_id,
                    position: evt.newIndex + 1,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('on Add');
                console.log(data);
            });
        },
        onUpdate: function (evt) {
            const image_name = evt.item.getAttribute('data-image-name');
            const url = `{{ url('sort-profile-media') }}`;
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    image_name: image_name,
                    user_id: user_id,
                    position: evt.newIndex + 1,
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('on update');
                console.log(data);
            });
        }
    });
</script>
<!-- End Sort Photos -->

<!-- Permissions of memberships -->
<script>
    const membership_name = '{{ $membership->name }}';
    const membership_id = '{{ $membership->id }}';
    const drag_files = document.getElementById('drag_files');
    const drag_files_permission = '{{ $permissions['drag_files'] }}';
    // console.log(drag_files_permission);
    const pro_day_future = document.getElementById('pro_day_future');
    const pro_day_future_permission = '{{ $permissions['pro_day_future_video'] }}';
    const throwing_mechanic_feature_video = document.getElementById('throwing_mechanic_feature_video');
    const throwing_mechanic_feature_video_permission = '{{ $permissions['throwing_mechanic_feature_video'] }}';
    const my_awesome_dropzone = document.getElementById('my-awesome-dropzone');
    if(!drag_files_permission) {
        drag_files.style.backgroundColor = '#e6e6e6';
        drag_files.classList.add('drag_files_bg');
        const p = document.createElement('p');
        p.innerHTML = 'You do not have permission to upload photos';
        drag_files.appendChild(p);
        my_awesome_dropzone.style.display = 'none';
    }

    if(!pro_day_future_permission && !throwing_mechanic_feature_video_permission){
        const input_pro_day_future = document.querySelector("#input_link");
        const input_throwing_mechanic_feature_video = document.querySelector("#input_link_two")
        

        // Disabled inputs
        input_pro_day_future.disabled = true;
        input_throwing_mechanic_feature_video.disabled = true;
        
        // pro_day_future.style.backgroundColor = '#e6e6e6';
        // throwing_mechanic_feature_video.style.backgroundColor = '#e6e6e6';

        pro_day_future.style.display = 'none';
        throwing_mechanic_feature_video.style.display = 'none';

        pro_day_future.style.padding = '15px';
        throwing_mechanic_feature_video.style.padding = '15px';
        throwing_mechanic_feature_video.style.marginTop = '30px';
        throwing_mechanic_feature_video.style.marginBottom = '30px';

        pro_day_future.addEventListener('click', function (e) {
            window.location.href = `{{ url('memberships') }}`;
        });

        throwing_mechanic_feature_video.addEventListener('click', function (e) {
            window.location.href = `{{ url('memberships') }}`;
        });
    }
</script>
<!-- End Permissions of memberships -->
@stop