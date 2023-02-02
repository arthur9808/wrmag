@extends('layouts.frontend')
@section('title', 'WRMag - About Profile')
@section('content')


<!-- ===== PROFILE --->
<section id="section-profile_detail" class="profile_detail">
    <div class="container">
        <div class="row" id="profile_desktop">
            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                @if($profile->profile_photo)
                <div class="left_top" style="background-image: url('{{ asset('storage/'.$profile->profile_photo) }}')">
                @else
                <div class="left_top" style="background-image: url('{{ asset('template/assets/img/photo_p.png') }}')">
                @endif
                    <div class="spacer"></div>
                    <div class="row scrore">
                        
                    </div>
                </div>

                <!-- Validate Profile Information -->
                <?php
                    /* PROSPECT INFO */
                    $position = $profile->position ? $profile->position : '-';
                    $recruiting_class_of = $profile->recruiting_class_of ? $profile->recruiting_class_of : '-';
                    $height = $profile->height ? $profile->height : false;
                    $weight = $profile->weight ? $profile->weight : false;
                    $current_gpa = $profile->current_gpa ? $profile->current_gpa : false;
                    $arm_length = $profile->arm_length ? $profile->arm_length : false;
                    $hand_size = $profile->hand_size ? $profile->hand_size : false;
                    $wing_span = $profile->wing_span ? $profile->wing_span : false;
                    $feet_size = $profile->feet_size ? $profile->feet_size : false;
                    $college_recruiting_status = $profile->college_recruiting_status ? $profile->college_recruiting_status : false;
                    if($profile->university) {
                        $university = $profile->university->name ? $profile->university->name : false;
                        $university_logo = $profile->university->logo ? $profile->university->logo : false;


                    } else {
                        $university = false;
                        $university_logo = false;
                    }

                    /* END PROSPECT INFO */

                    /* CONTACT INFO */
                    $email = $profile->qb_email ? $profile->qb_email : '-';
                    $phone = $profile->phone ? $profile->phone : '-';
                    $coach_name = $profile->qb_coachs_name ? $profile->qb_coachs_name : '-';
                    $coach_phone = $profile->qb_coachs_mobile ? $profile->qb_coachs_mobile : '-';
                    $coach_email = $profile->qb_coachs_email ? $profile->qb_coachs_email : '-';
                    /* END CONTACT INFO */

                    /* PERFORMANCE STATS */
                    $forty_yard_dash = $performance->forty_yard_dash ? $performance->forty_yard_dash : false;
                    $brench_press = $performance->brench_press ? $performance->brench_press : false;
                    $strength_squat = $performance->strength_squat ? $performance->strength_squat : false;
                    $vertical_jump = $performance->vertical_jump ? $performance->vertical_jump : false;
                    $broad_jump = $performance->broad_jump ? $performance->broad_jump : false;
                    $three_cone_drill = $performance->three_cone_drill ? $performance->three_cone_drill : false;
                    $twenty_yard_shuttle = $performance->twenty_yard_shuttle ? $performance->twenty_yard_shuttle : false;
                    /* END PERFORMANCE STATS */

                    /* ACADEMIC STATS */
                    $graduation_class_year = $academic->graduation_class_year ? $academic->graduation_class_year : false;
                    $school_name = $academic->school_name ? $academic->school_name : false;
                    $city = $academic->city ? $academic->city : false;
                    $state = $academic->state ? $academic->state : false;
                    $current_gpa_academic = $academic->current_gpa ? $academic->current_gpa : false;
                    $sat_score = $academic->sat_score ? $academic->sat_score : false;
                    $atc_score = $academic->atc_score ? $academic->atc_score : false;
                    $year_academic = $academic->year ? $academic->year : false;
                    $name_of_the_honor_or_award = $academic->name_of_the_honor_or_award ? $academic->name_of_the_honor_or_award : false;
                    $wonderlic_practice_test = $academic->wonderlic_practice_test ? $academic->wonderlic_practice_test : false;
                    /* END ACADEMIC STATS */

                    
                    /* MEDIA */
                    $media_highlights_youtube_video_Link = $media->media_highlights_youtube_video_Link ? $media->media_highlights_youtube_video_Link : false;
                    $pro_day_feature_video_youtube_video_link = $media->pro_day_feature_video_youtube_video_link ? $media->pro_day_feature_video_youtube_video_link : false;
                    $throwing_mechanic_feature_video_youtube_video_link = $media->throwing_mechanic_feature_video_youtube_video_link ? $media->throwing_mechanic_feature_video_youtube_video_link : false;
                    /* END MEDIA */
                ?>
                <!-- ===== featured photo --->
                <?php
                    $photos_conditional = $media->featured_photos_upload ? $media->featured_photos_upload : false;
                    $photos = [];
                    if($photos_conditional) {
                        $featured_photos = json_decode($photos_conditional);
                        if($featured_photos) {
                            foreach($featured_photos as $featured_photo) {
                                if($featured_photo){
                                    // $photos[] = $featured_photo->image_path;
                                    $photos[$featured_photo->sort_order] = $featured_photo->image_path;
                                }
                            }
                        }
                    }
                    // dd($photos);
                ?>
                <!-- ===== Media--->
                <?php
                    $array_videos_yt = [];
                    $array_videos_hudl = [];
                    
                    if($media_highlights_youtube_video_Link) {
                        
                        foreach(json_decode($media_highlights_youtube_video_Link) as $video_link) {
                            if(strpos($video_link, 'youtube') !== false) {
                                $video_link = explode("=", $video_link);
                                $video_link_video_id = $video_link[1];
                                if(strpos($video_link_video_id, '&t') !== false) {
                                    $video_link_video_id = explode("&t", $video_link_video_id);
                                    $video_link_video_id = $video_link_video_id[0];
                                }
                                $array_videos_yt[] = $video_link_video_id;
                            } else if(strpos($video_link, 'youtu.be') !== false) {
                                $video_link = explode("/", $video_link);
                                $array_videos_yt[] = $video_link[3];
                            } 
                            else if(str_contains($video_link, 'hudl.com/v')) {

                                $video_link = str_replace('/video', '/embed/video', $video_link);
                                $array_videos_hudl[] = $video_link;

                            }   else {
                                $array_videos_hudl[] = $video_link;
                            }
                        }
                    }
                ?>
                <!-- ===== Pro day --->
                <?php
                    if($pro_day_feature_video_youtube_video_link != null) {

                        $pro_day_feature_video =  $pro_day_feature_video_youtube_video_link;

                        if(strpos($pro_day_feature_video, 'youtube') !== false) {
                        
                                $pro_day_feature_video = explode("=", $pro_day_feature_video);
                                $pro_day_feature_video_youtube_video_link_video_id = $pro_day_feature_video[1];
                        
                        } else if(strpos($pro_day_feature_video, 'youtu.be') !== false) {
                            
                                $pro_day_feature_video = explode("/", $pro_day_feature_video);
                                $pro_day_feature_video_youtube_video_link_video_id = $pro_day_feature_video[3];
                        }
                    
                    }
                ?>

                <!-- ===== feature video--->
                <?php
                    if($throwing_mechanic_feature_video_youtube_video_link != null){

                        $throwing_mechanic_feature = $throwing_mechanic_feature_video_youtube_video_link;

                        if(strpos($throwing_mechanic_feature, 'youtube') !== false) {
                        
                        $throwing_mechanic_feature = explode("=", $throwing_mechanic_feature);
                        $throwing_mechanic_feature_video_youtube_video_link_clean_video_id = $throwing_mechanic_feature[1];
                
                        } else if(strpos($throwing_mechanic_feature, 'youtu.be') !== false) {
                            
                                $throwing_mechanic_feature = explode("/", $throwing_mechanic_feature);
                                $throwing_mechanic_feature_video_youtube_video_link_clean_video_id = $throwing_mechanic_feature[3];
                        }
                    }
                ?>
                <!-- End Validate Profile Information -->

                <div class="left-2nd">
                    <h4 style="text-transform: Uppercase;">{{ $profile->f_name .' '. $profile->l_name }}</h4>
                    {{-- <h5>Dual Threat</h5> --}}
                    <h5>{{ $position }}</h5>
                    <p>Recruiting Class of {{ $recruiting_class_of }}</p>
                    <div class="cntr"> 
                        <button class="bttn_red">
                            @if(!$profile->profile_image)
                            Quarterback
                            @else
                            {{  $profile->i_am }}
                            @endif
                        </button> 
                    </div>
                </div>

                <div class="profile_views">
                    <h5>Profile Views <span class="numbr">{{ $profile->views }}</span></h5>
                </div>
                <div class="left-2nd">
                    <p>College Recruiting Status: {{ $college_recruiting_status }}</p>
                    @if($university)
                    <h5>Committed to:</h5>
                    <h6>{{ $university }}</h6>
                    @endif
                    @if($university_logo)
                    <img src = "{{ asset('storage/'.$university_logo) }}" alt="" width="146px" height="104px">
                    @endif
                </div>
                @if($height || $current_gpa || $hand_size || $weight || $hand_size || $arm_length || $wing_span)
                <div class="left_info">
                    <h5>Prospect Info</h5>
                    <div class="row">
                        <div class="col-6 measurement">
                            <div class="colss">
                                <h6>
                                    @if($height)
                                    {{ $height }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Height</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($current_gpa)
                                    {{ $current_gpa  }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Current GPA</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($hand_size)
                                    {{ $hand_size }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Hand Size</p>
                            </div>
                        </div>
                        <div class="col-6 measurement">
                            <div class="colss">
                                <h6>
                                    @if($weight)
                                    {{ $weight }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Weight</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($arm_length)
                                    {{ $arm_length }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Arm Length</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($wing_span)
                                    {{ $wing_span }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Wing Span</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="contact">
                    <h5>CONNECT</h5>
                    <div class="Recruit’s social_media_icons" style="margin:15px 0px;">
                        @if($profile->instagram)
                        <a href="https://www.instagram.com/{{ $profile->instagram }}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($profile->twitter)
                        <a href="https://twitter.com/{{ $profile->twitter }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($profile->tiktok)
                        <a href="https://www.tiktok.com/{{ '@'.$profile->tiktok }}"><i class="fab fa-tiktok"></i></a>
                        @endif
                    </div>
                    <div class="divider"></div>
                    <div class="contact_profile_desk" style="margin:15px 0px;">
                        <h5>CONTACT</h5>
                        <div class="Recruit’s">
                            <p>QB Recruit’s E-mail</p>
                            <h6>
                                @if($email)
                                <a href="mailto:{{ $email }}" style="text-decoration: none; color: #000;">{{ $email }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                    </div>
                    <div class="Recruit’s">
                        <p>QB Recruit’s Phone</p>
                        <h6>
                            @if($phone)
                            <a href="tel:{{ $phone }}" style="text-decoration: none; color: #000;">{{ $phone }}</a>
                            @else
                            -
                            @endif
                        </h6>
                    </div>
                    <div class="divider"></div>
                    <div class="qb_profile_desk" style="margin:15px 0px;">
                        <div class="Recruit’s">
                            <p>QB Coach’s Name</p>
                            <h6>
                                @if($coach_name)
                                {{ $coach_name }}
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                        <div class="Recruit’s">
                            <p>QB Coach’s Mobile</p>
                            <h6>
                                @if($coach_phone)
                                <a href="tel:{{ $coach_phone }}" style="text-decoration: none; color: #000;">{{ $coach_phone }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                        <div class="Recruit’s">
                            <p>QB Coach’s E-mail</p>
                            <h6>
                                @if($coach_email)
                                <a href="mailto:{{ $coach_email }}" style="text-decoration: none; color: #000;">{{ $coach_email }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="tweets">
                    @if($profile->twitter)
                    <a class="twitter-timeline" id="twitter_widget" href="https://twitter.com/{{ $profile->twitter }}?ref_src=twsrc%5Etfw" data-chrome="noheader nofooter noborders" data-tweet-limit="2" data-show-replies="false">Tweets by {{ $profile->twitter }}</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    @endif
                </div>

            </div>

            <div class="col-xl-8 col-lg-8 col-sm-12 col-sm 12 ">
                @if(!$profile->profile_cover_header)
                <div class="cober-pic header_css" style="background-image: url('{{ asset('template/assets/img/profile_about_cover.png') }}')">
                @else
                <div class="cober-pic header_css" style="background: url({{ asset('storage/'.$profile->profile_cover_header) }}) no-repeat center center; background-size: contain;">
                @endif
                </div>
                <div class="after_cover">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                            <p>{{ $profile->position }}</p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 bordr">
                            <p>
                                @if($profile->city || $profile->state)
                                {{ $profile->city }}, {{ $profile->state }}
                                @endif
                                @if($profile->country && $profile->city)
                                ,
                                @endif
                                @if($profile->country)
                                {{ $profile->country }}
                                @endif
                            </p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 bordr_two">
                            @if($profile->recruiting_class_of)
                            <p>Class of {{ $profile->recruiting_class_of }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="paragraph">
                    <?php
                        $biography = $profile->biography;
                        $biography = str_replace("\n", "<br>", $biography);
                    ?> 
                    @if($profile->biography)
                    <img src="{{ asset('template/assets/img/co (1).png') }}" alt="">
                    <p>
                        {!! $biography !!}
                    </p>
                    @endif
                </div>
                @if($height || $hand_size || $weight || $arm_length || $wing_span || $feet_size)
                <div class="measure_faq">
                    <div class="plus" id="measurables_stats">
                        <i class="fas fa-plus"></i>
                        <h5>MEASURABLES STATS</h5>
                    </div>
                    <div class="row box" id="measurables_stats_collapse">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($height)
                                    {{ $height }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Height</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($hand_size)
                                    {{ $hand_size }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Hand Size</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($weight)
                                    {{ $weight }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Weight</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($wing_span)
                                    {{ $wing_span }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Wing Span </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($arm_length)
                                    {{ $arm_length }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Arm Length</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($feet_size)
                                    {{ $feet_size }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Feet Size</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            
                @if($forty_yard_dash || $brench_press || $strength_squat || $vertical_jump || $broad_jump || $three_cone_drill || $twenty_yard_shuttle)
                <div class="performance_faq">
                    <div id ="show_performance_stats" class="plus">
                        <i class="fas fa-plus"></i>
                        <h5>PERFORMANCE STATS</h5>
                    </div>
                    <div class="columns_images" id="performance_stats_collapse">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($forty_yard_dash)
                                    {{ $forty_yard_dash }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>40 Yard Dash</p>
                                <img src="{{ asset('template/assets/img/Artboard 2.png') }}" alt="">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($brench_press)
                                    {{ $brench_press }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Bench Press</p>
                                <img src="{{ asset('template/assets/img/Artboard 3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($strength_squat)
                                    {{ $strength_squat }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Strength Squat</p>
                                <img src="{{ asset('template/assets/img/Artboard 4.png') }}" alt="">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($vertical_jump)
                                    {{ $vertical_jump }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Vertical Jump</p>
                                <img src="{{ asset('template/assets/img/Artboard 5.png') }}" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($broad_jump)
                                    {{ $broad_jump }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Broad Jump</p>
                                <img src="{{ asset('template/assets/img/Artboard 6.png') }}" alt="">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 sol-xs-12">
                                <h6>
                                    @if($three_cone_drill)
                                    {{ $three_cone_drill }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Three-Cone Drill</p>
                                <img src="{{ asset('template/assets/img/Artboard 7.png') }}" alt="">
                            </div>
                        </div>
                        @if($twenty_yard_shuttle)
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-sm-12 sol-xs-12">
                                <h6>
                                    {{ $twenty_yard_shuttle }}
                                </h6>
                                <p>20-Yard Shuttle</p>
                                <img src="{{ asset('template/assets/img/Artboard 8.png') }}" alt="">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                <?php
                    $college_offers_football_commit = str_split($performance->college_offers_football_commit);
                    $college_offers_football_commit_filter = array_filter($college_offers_football_commit, 'is_numeric');
                    $college_offers_football_commit_filter = array_values($college_offers_football_commit_filter);
                    $commit_array = array(
                        'commit' => $college_offers_football_commit_filter,
                        'university' => json_decode($performance->college_offers_football_university),
                        'offer' => json_decode($performance->college_offers_offer),
                        'date' => json_decode($performance->college_offers_date)
                    );
                    $show_college_offers = $commit_array['date'][0] != null ? true : false;
                    // $show_college_offers = true;
                ?>
                {{-- {{  dd($commit_array) }} --}}

                @if($show_college_offers)
                <div class="college_offer">
                    <div class="plus" id="college_offers">
                        <i class="fas fa-plus"></i>
                        <h5>COLLEGE OFFERS + COMMITS</h5>
                    </div>
                    <div class="offers table_outer hidden" id="college_offers_collapse">
                        <div class="row">
                            <div class="col-2">
                                <h6>COMMIT</h6>
                            </div>
                            <div class="col-5">
                                <h6>FOOTBALL UNIVERSITY</h6>
                            </div>
                            <div class="col-2">
                                <h6>TYPE</h6>
                            </div>
                            <div class="col-3">
                                <h6>DATE</h6>
                            </div>
                        </div>
                        @for($i = 0; $i < count($commit_array['date']); $i++)
                        <div class="row">
                            <div class="col-2 check_commit">
                                @if(empty($commit_array['commit'][$i]))
                                <p></p>
                                @elseif($commit_array['commit'][$i] == 1)
                                <p><i class="fas fa-check"></i></p>
                                @elseif($commit_array['commit'][$i] == 0)
                                <p></p>
                                @endif
                            </div>
                            <div class="col-5">
                                <p>{{ $commit_array['university'][$i] }}</p>
                            </div>
                            <div class="col-2">
                                <p>{{ $commit_array['offer'][$i] }}</p>
                            </div>
                            <div class="col-3">
                                <p>{{  date('m-d-Y', strtotime($commit_array['date'][$i])) }}</p>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endif
                <?php
                    $prospects_camps = array(
                        'date' => json_decode($performance->prospect_camps_date),
                        'name' => json_decode($performance->prospect_camps_name),
                        'location' => json_decode($performance->prospect_camps_location),
                        'coach' => json_decode($performance->prospect_camps_coach_name)
                    );
                    $show_prospect_camps = $prospects_camps['date'][0] != null ? true : false;
                    // $show_prospect_camps = true;
                ?>
                {{-- {{ dd($prospects_camps) }} --}}
                @if($show_prospect_camps)
                <div class="campus">
                    <div class="plus" id="prospect_camps">
                        <i class="fas fa-plus"></i>
                        <h5>PROSPECT CAMPS</h5>
                    </div>
                    <div class="offers table_outer hidden" id="prospect_camps_collapse">
                        <div class="row">
                            <div class="col-3">
                                <h6>DATE</h6>
                            </div>
                            <div class="col-3">
                                <h6>NAME</h6>
                            </div>
                            <div class="col-3">
                                <h6>LOCATION</h6>
                            </div>
                            <div class="col-3">
                                <h6>COACH</h6>
                            </div>
                        </div>
                        @for($i = 0; $i < count($prospects_camps['date']); $i++)
                        <div class="row">
                            <div class="col-3">
                                <p>{{  date('m-d-Y', strtotime($prospects_camps['date'][$i])) }}</p>
                            </div>  
                            <div class="col-3">
                                <p>{{ $prospects_camps['name'][$i] }}</p>
                            </div>  
                            <div class="col-3">
                                <p>{{ $prospects_camps['location'][$i] }}</p>
                            </div>
                            <div class="col-3">
                                <p>{{ $prospects_camps['coach'][$i] }}</p>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @endif

                @if($graduation_class_year || $school_name || $city || $state || $current_gpa_academic || $sat_score || $atc_score || $year_academic || $name_of_the_honor_or_award)
                <div class="academic">
                    <div class="plus" id="academic_stats">
                        <i class="fas fa-plus"></i>
                        <h5>ACADEMIC STATS</h5>
                    </div>
                    <div class="offers table_outer center_align hidden" id="academic_stats_collapse">
                        <div class="row">
                            <div class="col-5">
                                <h6>Graduation Class Year</h6>
                                <p>
                                    @if($graduation_class_year)
                                    {{ $graduation_class_year }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-4">
                                <h6>School Name</h6>
                                <p>
                                    @if($school_name)
                                    {{ $school_name }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-3">
                                <h6>City</h6>
                                <p>
                                    @if($city)
                                    {{ $city }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-4">
                                <h6>State</h6>
                                <p>
                                    @if($state)
                                    {{ $state }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-4">
                                <h6>Current GPA</h6>
                                <p>
                                    @if($current_gpa_academic)
                                    {{ $current_gpa_academic }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-4">
                                <h6>SAT Score</h6>
                                <p>
                                    @if($sat_score)
                                    {{ $sat_score }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-3">
                                <h6>ACT Score</h6>
                                <p>
                                    @if($atc_score)
                                    {{ $atc_score }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-3">
                                <h6>Year</h6>
                                <p>
                                    @if($year_academic)
                                    {{ $year_academic }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-6">
                                <h6>Name of the Honor or Award</h6>
                                <p>
                                    @if($name_of_the_honor_or_award)
                                    {{ $name_of_the_honor_or_award }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Graduation Class Year</th>
                                    <th scope="col">School Name</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if($graduation_class_year)
                                        {{ $graduation_class_year }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($school_name)
                                        {{ $school_name }}</td>
                                        @else
                                        -
                                        @endif
                                    <td>
                                        @if($city)
                                        {{ $city }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($state)
                                        {{ $state }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="dividerr_ "></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">CURRENT GPA</th>
                                    <th scope="col">SAT SCORE</th>
                                    <th scope="col">ACT SCORE</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if($current_gpa_academic)
                                        {{ $current_gpa_academic }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($sat_score)
                                        {{ $sat_score }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($atc_score)
                                        {{ $atc_score }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="dividerr_ "></div>
                        <table class="table award">
                            <thead>
                                <tr>
                                    <th scope="col">YEAR</th>
                                    <th scope="col">NAME OF THE HONOR OR AWARD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if($year_academic)
                                        {{ $year_academic }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($name_of_the_honor_or_award)
                                        {{ $name_of_the_honor_or_award }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                </div>
                @endif

                <?php
                    $hight_school_stats = array(
                        'year' => json_decode($academic->hight_school_stats_year),
                        'games_played' => json_decode($academic->hight_school_stats_games_played),
                        'completions' => json_decode($academic->hight_school_stats_completions),
                        'passing_attempts' => json_decode($academic->hight_school_stats_passing_attempts),
                        'passing_yards' => json_decode($academic->hight_school_stats_passing_yards),
                        'passing_tds' => json_decode($academic->hight_school_stats_passing_tds),
                        'rushing_yards' => json_decode($academic->hight_school_stats_rushing_yards),
                        'rushing_tds' => json_decode($academic->hight_school_stats_rushing_tds),
                    );
                    $show_hight_school_stats = $hight_school_stats['year'][0] != null ? true : false;
                ?>
                @if($show_hight_school_stats)
                <div class="football">
                    <div class="plus" id="hight_school_stats_div">
                        <i class="fas fa-plus"></i>
                        <h5>SCHOOL STATS</h5>
                    </div>
                    <div class="career hidden" id="hight_school_stats_div_collapse">
                        <div class="offers table_outer">
                            @for($i = 0; $i < count($hight_school_stats['year']); $i++)
                            <div class="row" style="background-color: #e9ecef;">
                                <div class="col-4">
                                    <h6>{{ $hight_school_stats['year'][$i] }}</h6>
                                </div>
                                <div class="col-8">
                                    <h6>Games Played: {{ $hight_school_stats['games_played'][$i] }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Completions: <br> {{ $hight_school_stats['completions'][$i] }}</p>
                                </div>
                                <div class="col-4">
                                    <p>Passing Attempts: <br> {{ $hight_school_stats['passing_attempts'][$i] }}</p>
                                </div>
                                <div class="col-4">
                                    <p>Passing Yards: <br> {{ $hight_school_stats['passing_yards'][$i] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Passing TDs: <br> {{ $hight_school_stats['passing_tds'][$i] }}</p>
                                </div>
                                <div class="col-4">
                                    <p>Rushing Yards: <br> {{ $hight_school_stats['rushing_yards'][$i] }}</p>
                                </div>
                                <div class="col-4">
                                    <p>Rushing TDs: <br> {{ $hight_school_stats['rushing_tds'][$i] }}</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                @endif

                <?php
                    $football_career_honors = array(
                        'year' => json_decode($academic->football_career_honors_year),
                        'honors' => json_decode($academic->football_career_honors),
                    );
                    $show_football_career_honors = $football_career_honors['year'][0] != null ? true : false;
                    // $show_football_career_honors = true;
                ?>
                {{-- {{ dd($football_career_honors) }} --}}
                @if($show_football_career_honors)
                <div class="football">
                    <div class="plus" id="football_career_honors_div">
                        <i class="fas fa-plus"></i>
                        <h5>FOOTBALL CAREER HONORS</h5>
                    </div>
                    <div class="career hidden" id="football_career_honors_div_collapse">
                        <div class="offers table_outer center_align">
                            <div class="row">
                                <div class="col-4">
                                    <h6>YEAR</h6>
                                </div>
                                <div class="col-8">
                                    <h6>FOOTBALL CAREER HONORS</h6>
                                </div>
                            </div>
                            @for($i = 0; $i < count($football_career_honors['year']); $i++)
                            <div class="row">
                                <div class="col-4">
                                    <p>{{ $football_career_honors['year'][$i] }}</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $football_career_honors['honors'][$i] }}</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                @endif
                @if($wonderlic_practice_test)
                <div class="wonderlic">
                    <div class="plus" id="wonderlic_practice_div">
                        <i class="fas fa-plus"></i>
                        <h5>WONDERLIC (PRACTICE) TEST</h5>
                    </div>
                    <div class="gpa topp borderr_ wonder hidden" id="wonderlic_practice_div_collapase">
                        <div class="row four-colss  mid_secc">
                            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                <a style="text-decoration: none; color:#636363" href="https://wonderlictestpractice.com/" target="_blank"><h6>www.WonderLicTestPractice.com</h6></a>
                            </div>
                            @if($wonderlic_practice_test)
                                <img src="{{ asset('storage/'.$wonderlic_practice_test) }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <div class="QB">
                    <div class="row">
                        <div class="col-1 col_box">
                            <div class="box-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 title_box">
                            <div class="box-title">
                                <div class="plus">
                                    <h5>QB’S STATISTICAL ANALYSIS SCORES</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 coming_box">
                            <div class="box-coming soon">
                                <h6>COMING SOON</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="QB">
                    <div class="row">
                        <div class="col-1 col_box">
                            <div class="box-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 title_box">
                            <div class="box-title">
                                <div class="plus">
                                    <h5>RECRUIT SCOUT REPORT</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 coming_box">
                            <div class="box-coming soon">
                                <h6>COMING SOON</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== Photos ===== -->
            @if(isset($photos))
            <?php ksort($photos); ?>
            <section id="feature_photos" class="slider">
                <div class="container">
                    <div class="feature_text">
                        <h4>FEATURED PHOTOS</h4>
                    </div>
                    <div class="row" id="featured_gallery">
                        
                        <div class="masonry_gallery">
                            @foreach($photos as $photo)
                            <img src="{{ asset('storage/'.$photo) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- ===== End Photos ===== -->

            <!-- ===== Media Highlights ===== -->
            @if($media_highlights_youtube_video_Link != '[null]')
            {{-- @if(isset($array_videos_yt) || isset($array_videos_hudl)) --}}
            <section id="media_highlights" class="image_sec">
                <div class="container">
                    <div class="feature_textt">
                        <h4>MEDIA HIGHLIGHTS</h4>
                    </div>
                    <div class="row" id="thing-with-videos">
                        @foreach($array_videos_yt as $video_yt)
                        <div class="col-xl-6 col-lg-6 highlight_video">
                            <iframe id="video_h" src="https://www.youtube.com/embed/{{ $video_yt }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @endforeach
                        @foreach($array_videos_hudl as $video_hudl)
                        <div class="col-xl-6 col-lg-6 highlight_video">
                            <iframe id="video_h" src="{{ $video_hudl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            <!-- ===== End Media Highlights ===== -->

            <!-- ===== Pro day --->
            @if(isset($pro_day_feature_video_youtube_video_link_video_id))
            <section id="pro_day" class="image_sec">
                <div class="container">
                    <div class="feature_text">
                        <h4>PRO DAY (FEATURE VIDEO)</h4>
                    </div>
                    <div class="row">
                        
                        <div class="col-12 grid" style="display: flex; align-items: center; justify-content: center;" id="pro_day_feature_video_youtube_video_content">
                            {{-- <img src="{{ asset('template/assets/img/Screen Shot 2021-12-13 at 10.28 3.png') }}" alt=""> --}}
                                @if(isset($pro_day_feature_video_youtube_video_link_video_id))
                                    <iframe width="980" height="507" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $pro_day_feature_video_youtube_video_link_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                        </div>
                        

                    </div>
                </div>
            </section>
            @endif
            <!-- ===== End Pro day --->

            <!-- ===== Throwing mechanic ===== -->
            @if(isset($throwing_mechanic_feature_video_youtube_video_link_clean_video_id))
            <section id="feature_video" class="image_sec">
                <div class="container">
                    <div class="feature_textt">
                        <h4>THROWING MECHANIC (FEATURE VIDEO)</h4>
                    </div>
                    <div class="row">
                        
                        <div class="col-12 grid" style="display: flex; align-items: center; justify-content: center;" id="throwing_mechanic_feature_video_youtube_video_content">
                            {{-- <img src="{{ asset('template/assets/img/Screen Shot 2021-12-13 at 10.28 3.png') }}" alt=""> --}}
                                @if(isset($throwing_mechanic_feature_video_youtube_video_link_clean_video_id))
                                    <iframe width="980" height="507" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $throwing_mechanic_feature_video_youtube_video_link_clean_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- ===== End Throwing mechanic ===== -->
        </div>
        <div class="row" id="profile_mobile">
            <div class="profile-header" style="background: #000">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-10 offset-xs-1 col-sm-6 col-md-5 col-xl-3">
                            <div class="profile-pic">
                                @if($profile->profile_photo)
                                <img class="img-fluid" src="{{ asset('storage/'.$profile->profile_photo) }}" alt="WR Magazine Player {{ $profile->f_name . ' ' . $profile->l_name }} Profile image">
                                @else
                                <img class="img-fluid" src="{{ asset('template/assets/img/photo_p.png') }}" alt="WR Magazine Player Profile image">
                                @endif
                                <div class="profile-name">
                                    <h2>{{ $profile->f_name . ' ' . $profile->l_name }}</h2>
                                    @if($profile->recruiting_class_of)
                                    <h4>Class of {{ $profile->recruiting_class_of }}</h4>
                                    @endif
                                    @if($profile->position)
                                    <h4>{{ $profile->position }}</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cober-pic">
                @if($profile->profile_cover_header)
                <img id="profile_cover_header" src = "{{ asset('storage/'.$profile->profile_cover_header) }}" alt="" width="100%">
                @else
                <img src="{{ asset('template/assets/img/imagen cover.png') }}" alt="">
                @endif
            </div>
            <div class="inner content container">
                <div class="row">
                    <div class="col-12">
                        <div class="profile-school d-flex justify-content-center">
                            <ul>
                                <li>{{ $academic->school_name }}</li>
                                <li>
                                    @if($profile->city)
                                    {{ $profile->city . ', ' . $profile->state  }}
                                    @endif
                                    @if($profile->city && $profile->country)
                                    ,
                                    @endif
                                    @if($profile->country)
                                    {{ $profile->country }}
                                    @endif
                                </li>
                                @if($profile->position)
                                <li>Class Of {{ $profile->recruiting_class_of }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="paragraph">
                            @if($profile->biography)
                            <img src="{{ asset('template/assets/img/co (1).png') }}" alt="">
                            <p>
                                {!! $biography !!}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                
                <div class="row scrore"></div>
                <div class="profile_views">
                    <h5>Profile Views <span class="numbr">{{ $profile->views }}</span></h5>
                </div>
                <div class="left-2nd">
                    <p>College Recruiting Status: <br>{{ $college_recruiting_status }}</p>
                    @if($university)
                    <h5>Committed to:</h5>
                    <h6>{{ $university }}</h6>
                    @endif
                    @if($university_logo)
                    <img src = "{{ asset('storage/'.$university_logo) }}" alt="" width="146px" height="104px">
                    @endif
                </div>
                @if($height || $current_gpa || $hand_size || $weight || $hand_size || $arm_length || $wing_span)
                <div class="left_info">
                    <h5>Prospect Info</h5>
                    <div class="row">
                        <div class="col-6 measurement">
                            <div class="colss">
                                <h6>
                                    @if($height)
                                    {{ $height }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Height</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($current_gpa)
                                    {{ $current_gpa  }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Current GPA</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($hand_size)
                                    {{ $hand_size }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Hand Size</p>
                            </div>
                        </div>
                        <div class="col-6 measurement">
                            <div class="colss">
                                <h6>
                                    @if($weight)
                                    {{ $weight }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Weight</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($arm_length)
                                    {{ $arm_length }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Arm Length</p>
                            </div>
                            <div class="colss">
                                <h6>
                                    @if($wing_span)
                                    {{ $wing_span }}
                                    @else
                                    -
                                    @endif
                                </h6>
                                <p>Wing Span</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                

                
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 sol-xs-12">
                
                <!-- MEASURABLES STATS MOBILE -->
                @if($height || $hand_size || $weight || $arm_length || $wing_span || $feet_size)
                <div class="measure_faq">
                    <div class="plus" id="measurables_stats_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>MEASURABLES STATS</h5>
                    </div>

                    <div class="row box hidden" id="measurables_stats_collapse_mobile">
                        <div class="row measurables_stats">
                            <div class="col-6">
                                    <h6>
                                        @if($height)
                                        {{ $height }}
                                        @else
                                        -
                                        @endif
                                    </h6>
                                    <p>Height</p>
                                </div>
                                <div class="col-6">
                                    <h6>
                                        @if($hand_size)
                                        {{ $hand_size }}
                                        @else
                                        -
                                        @endif
                                    </h6>
                                    <p>Hand Size</p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row measurables_stats">
                            <div class="col-6">
                                    <h6>
                                        @if($weight)
                                        {{ $weight }}
                                        @else
                                        -
                                        @endif
                                    </h6>
                                    <p>Weight</p>
                            </div>
                            <div class="col-6">
                                    <h6>
                                        @if($wing_span)
                                        {{ $wing_span }}
                                        @else
                                        -
                                        @endif
                                    </h6>
                                    <p>Wing Span </p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row measurables_stats">
                            <div class="col-6">
                                    <h6>
                                        @if($arm_length)
                                        {{ $arm_length }}
                                        @else
                                        -
                                        @endif
                                    </h6>
                                    <p>Arm Length</p>
                            </div>
                            <div class="col-6">
                                    <h6>
                                        @if($feet_size)
                                        {{ $feet_size }}
                                        @else
                                        -
                                        @endif
                                    </h6>
                                    <p>Feet Size</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
                <!-- END MESAUREBLES STATS MOBILE -->

                <!-- PERFORMANCE STATS MOBILE -->
                @if($forty_yard_dash || $brench_press || $strength_squat || $vertical_jump || $broad_jump || $three_cone_drill || $twenty_yard_shuttle)
                <div class="performance_faq">
                    <div id ="show_performance_stats_mobile" class="plus">
                        <i class="fas fa-plus"></i>
                        <h5>PERFORMANCE STATS</h5>
                    </div>
                    <div class="columns_images hidden" id="performance_stats_collapse_mobile">
                        <div class="row">
                            <div class="col-6 performance_stats_row">
                                <h6>
                                    @if($forty_yard_dash)
                                    {{ $forty_yard_dash }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>40 Yard Dash</p>
                                <img src="{{ asset('template/assets/img/Artboard 2.png') }}" alt="">
                            </div>
                            <div class="col-6 performance_stats_row">
                                <h6>
                                    @if($brench_press)
                                    {{ $brench_press }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Bench Press</p>
                                <img src="{{ asset('template/assets/img/Artboard 3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-6 performance_stats_row">
                                <h6>
                                    @if($strength_squat)
                                    {{ $strength_squat }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Strength Squat</p>
                                <img src="{{ asset('template/assets/img/Artboard 4.png') }}" alt="">
                            </div>
                            <div class="col-6 performance_stats_row">
                                <h6>
                                    @if($vertical_jump)
                                    {{ $vertical_jump }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Vertical Jump</p>
                                <img src="{{ asset('template/assets/img/Artboard 5.png') }}" alt="">
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-6 performance_stats_row">
                                <h6>
                                    @if($broad_jump)
                                    {{ $broad_jump }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Broad Jump</p>
                                <img src="{{ asset('template/assets/img/Artboard 6.png') }}" alt="">
                            </div>
                            <div class="col-6 performance_stats_row">
                                <h6>
                                    @if($three_cone_drill)
                                    {{ $three_cone_drill }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>Three-Cone Drill</p>
                                <img src="{{ asset('template/assets/img/Artboard 7.png') }}" alt="">
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        @if($twenty_yard_shuttle)
                        <div class="row">
                            <div class="col-12 performance_stats_row">
                                <h6>
                                    @if($twenty_yard_shuttle)
                                    {{ $twenty_yard_shuttle }}
                                    @else
                                    --
                                    @endif
                                </h6>
                                <p>20-Yard Shuttle</p>
                                <img src="{{ asset('template/assets/img/Artboard 8.png') }}" alt="">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                <!-- END PERFORMANCE STATS MOBILE -->

                <!-- COLLEGE OFFERS + COMMITS MOBILE -->
                @if($show_college_offers)
                <div class="college_offer">
                    <div class="plus" id="college_offers_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>COLLEGE OFFERS + COMMITS</h5>
                    </div>
                    <div class="offers table_outer hidden" id="college_offers_collapse_mobile">
                        @for($i = 0; $i < count($commit_array['date']); $i++)
                            <div class="row">
                                <div class="col-4 college_offers_row offers_left">
                                    <h6>COMMIT</h6>
                                    @if(empty($commit_array['commit'][$i]))
                                    <!-- X marks the spot if there is no commit from font awesome -->
                                    <p></p>
                                    @elseif($commit_array['commit'][$i] == 1)
                                    <p><i class="fas fa-check"></i></p>
                                    @elseif($commit_array['commit'][$i] == 0)
                                    <p></p>
                                    @endif
                                </div>
                                <div class="col-8 college_offers_row">
                                    <h6>FOOTBALL UNIVERSITY</h6>
                                    <p>{{ $commit_array['university'][$i] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 college_offers_row offers_left">
                                    <h6>TYPE</h6>
                                    <p>{{ $commit_array['offer'][$i] }}</p>
                                </div>
                                <div class="col-8 college_offers_row">
                                    <h6>DATE</h6>
                                    <p>{{  date('m-d-Y', strtotime($commit_array['date'][$i])) }}</p>
                                </div>
                            </div>
                            @if($i != count($commit_array['date']) - 1)
                                <div class="dividerr_ "></div>
                            @endif
                        @endfor
                    </div>
                </div>
                @endif
                <!-- END COLLEGE OFFERS + COMMITS MOBILE -->

                <!-- PROSPECTS CAMPS MOBILE -->
                @if($show_prospect_camps)
                <div class="campus">
                    <div class="plus" id="prospect_camps_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>PROSPECT CAMPS</h5>
                    </div>
                    <div class="offers table_outer hidden" id="prospect_camps_collapse_mobile">
                        
                        @for($i = 0; $i < count($prospects_camps['date']); $i++)
                            <div class="row">
                                <div class="col-6 prospect_camps_row camps_left">
                                    <h6>DATE</h6>
                                    <p>{{  date('m-d-Y', strtotime($prospects_camps['date'][$i])) }}</p>

                                </div>
                                <div class="col-6 prospect_camps_row">
                                    <h6>NAME</h6>
                                    <p>{{ $prospects_camps['name'][$i] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 prospect_camps_row camps_left">
                                    <h6>LOCATION</h6>
                                    <p>{{ $prospects_camps['location'][$i] }}</p>
                                </div>
                                <div class="col-6 prospect_camps_row">
                                    <h6>COACH</h6>
                                    <p>{{ $prospects_camps['coach'][$i] }}</p>
                                </div>
                            </div>

                            @if($i != count($prospects_camps['date']) - 1)
                                <div class="dividerr_ "></div>
                            @endif
                        @endfor
                    </div>
                </div>
                @endif
                <!-- END PROSPECTS CAMPS MOBILE -->

                <!-- ACADEMIC STATS MOBILE -->
                @if($graduation_class_year || $school_name || $city || $state || $current_gpa_academic || $sat_score || $atc_score || $year_academic || $name_of_the_honor_or_award)
                <div class="academic">
                    <div class="plus" id="academic_stats_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>ACADEMIC STATS</h5>
                    </div>

                    <div class="offers table_outer center_align hidden" id="academic_stats_collapse_mobile">
                        <div class="row">
                            <div class="col-6 academic_stats_row stats_left">
                                <h6>Graduation Class Year</h6>
                                <p>
                                    @if($graduation_class_year)
                                    {{ $graduation_class_year }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-6 academic_stats_row">
                                <h6>School Name</h6>
                                <p>
                                    @if($school_name)
                                    {{ $school_name }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-6 academic_stats_row stats_left">
                                <h6>City</h6>
                                <p>
                                    @if($city)
                                    {{ $city }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-6 academic_stats_row">
                                <h6>State</h6>
                                <p>
                                    @if($state)
                                    {{ $state }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-6 academic_stats_row stats_left">
                                <h6>CURRENT GPA</h6>
                                <p>
                                    @if($current_gpa_academic)
                                    {{ $current_gpa_academic }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-6 academic_stats_row">
                                <h6>SAT SCORE</h6>
                                <p>
                                    @if($sat_score)
                                    {{ $sat_score }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>

                        <div class="row">
                            <div class="col-6 academic_stats_row stats_left">
                                <h6>YEAR</h6>
                                <p>
                                    @if($year_academic)
                                    {{ $year_academic }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="col-6 academic_stats_row">
                                <h6>ACT SCORE</h6>
                                <p>
                                    @if($atc_score)
                                    {{ $atc_score }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="dividerr_ "></div>
                        <div class="row">
                            <div class="col-12 academic_stats_row">
                                <h6>NAME OF THE HONOR OR AWARD</h6>
                                <p>
                                    @if($name_of_the_honor_or_award)
                                    {{ $name_of_the_honor_or_award }}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- END ACADEMIC STATS MOBILE -->

                @if($show_hight_school_stats)
                <div class="football">
                    <div class="plus" id="hight_school_stats_div_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>SCHOOL STATS</h5>
                    </div>
                    <div class="career hidden" id="hight_school_stats_div_collapse_mobile">
                        <div class="offers table_outer table_hight_school_stats">
                            @for($i = 0; $i < count($hight_school_stats['year']); $i++)
                            <div class="row" style="background-color: #e9ecef;">
                                <div class="col-6">
                                    <h6>{{ $hight_school_stats['year'][$i] }}</h6>
                                </div>
                                <div class="col-6">
                                    <h6>Games Played: {{ $hight_school_stats['games_played'][$i] }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Completions: <br> {{ $hight_school_stats['completions'][$i] }}</p>
                                </div>
                                <div class="col-6">
                                    <p>Passing Attempts: <br> {{ $hight_school_stats['passing_attempts'][$i] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Passing Yards: <br> {{ $hight_school_stats['passing_yards'][$i] }}</p>
                                </div>
                                <div class="col-6">
                                    <p>Passing TDs: <br> {{ $hight_school_stats['passing_tds'][$i] }}</p>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Rushing Yards: <br> {{ $hight_school_stats['rushing_yards'][$i] }}</p>
                                </div>
                                <div class="col-6">
                                    <p>Rushing TDs: <br> {{ $hight_school_stats['rushing_tds'][$i] }}</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                @endif

                <!-- FOOTBALL CAREER HONORS MOBILE -->
                @if($show_football_career_honors)
                <div class="football">
                    <div class="plus" id="football_career_honors_div_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>FOOTBALL CAREER HONORS</h5>
                    </div>
                    <div class="career hidden" id="football_career_honors_div_collapse_mobile">
                        <div class="offers table_outer center_align">
                            @for($i = 0; $i < count($football_career_honors['year']); $i++)
                                <div class="row">
                                    <div class="col-4 football_career_honors_row career_honors_left">
                                        <h6>YEAR</h6>
                                        <p>{{ $football_career_honors['year'][$i] }}</p>
                                    </div>
                                    <div class="col-8 football_career_honors_row">
                                        <h6>FOOTBALL CAREER HONORS</h6>
                                        <p>{{ $football_career_honors['honors'][$i] }}</p>
                                    </div>
                                </div>
                                @if($i != count($football_career_honors['year']) - 1)
                                    <div class="dividerr_ "></div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                @endif
                <!-- END FOOTBALL CAREER HONORS MOBILE -->

                <!-- WONDERLIC TEST MOBILE -->
                @if($wonderlic_practice_test)
                <div class="wonderlic">
                    <div class="plus" id="wonderlic_practice_div_mobile">
                        <i class="fas fa-plus"></i>
                        <h5>WONDERLIC (PRACTICE) TEST</h5>
                    </div>
                    <div class="gpa topp borderr_ wonder hidden" id="wonderlic_practice_div_collapse_mobile">
                        <div class="row four-colss  mid_secc">
                            <div class="col-12">
                                <a style="text-decoration: none; color:#636363" href="https://wonderlictestpractice.com/" target="_blank"><h6>www.WonderLicTestPractice.com</h6></a>
                            </div>
                            @if($wonderlic_practice_test)
                            <!-- Cuando hagamos clickn abrimos la foto en una nueva pestaña -->
                                <img onclick="window.open('{{ asset('storage/'.$wonderlic_practice_test) }}')"
                                src="{{ asset('storage/'.$wonderlic_practice_test) }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <!-- END WONDERLIC TEST MOBILE -->

                <div class="QB" id="first_qb">
                    <div class="row">
                        <div class="col-1 col_box">
                            <div class="box-icon icon_mobile">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 title_box">
                            <div class="box-title">
                                <div class="plus">
                                    <h5>QB’S STATISTICAL ANALYSIS SCORES</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 coming_box">
                            <div class="box-coming soon">
                                <h6>COMING SOON</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="QB">
                    <div class="row">
                        <div class="col-1 col_box">
                            <div class="box-icon icon_mobile">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 title_box">
                            <div class="box-title">
                                <div class="plus">
                                    <h5>RECRUIT SCOUT REPORT</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 coming_box">
                            <div class="box-coming soon">
                                <h6>COMING SOON</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== Photos ===== -->
                @if(isset($photos))
                <?php ksort($photos); ?>
                <section id="feature_photos" class="slider">
                    <div class="container">
                        <div class="feature_text">
                            <h4>FEATURED PHOTOS</h4>
                        </div>
                        <div class="row" id="featured_gallery">
                            
                            <div class="masonry_gallery">
                                @foreach($photos as $photo)
                                <img src="{{ asset('storage/'.$photo) }}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                <!-- ===== End Photos ===== -->

                <!-- ===== Media Highlights ===== -->
                @if($media_highlights_youtube_video_Link != '[null]')
                {{-- @if(isset($array_videos_yt) || isset($array_videos_hudl)) --}}
                <section id="media_highlights" class="image_sec">
                    <div class="container">
                        <div class="feature_textt">
                            <h4>MEDIA HIGHLIGHTS</h4>
                        </div>
                        <div class="row" id="thing-with-videos">
                            @foreach($array_videos_yt as $video_yt)
                            <div class="col-xl-6 col-lg-6 highlight_video">
                                <iframe id="video_h" src="https://www.youtube.com/embed/{{ $video_yt }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            @endforeach
                            @foreach($array_videos_hudl as $video_hudl)
                            <div class="col-xl-6 col-lg-6 highlight_video">
                                <iframe id="video_h" src="{{ $video_hudl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif
                <!-- ===== End Media Highlights ===== -->

                <!-- ===== Pro day --->
                @if(isset($pro_day_feature_video_youtube_video_link_video_id))
                <section id="pro_day" class="image_sec">
                    <div class="container">
                        <div class="feature_text">
                            <h4>PRO DAY (FEATURE VIDEO)</h4>
                        </div>
                        <div class="row" id="pro_day_feature_video_youtube_video_content_mobile">
                            @if(isset($pro_day_feature_video_youtube_video_link_video_id))
                                <div class="col-xl-6 col-lg-6 highlight_video">
                                    <iframe id="video_h" src="https://www.youtube.com/embed/{{ $pro_day_feature_video_youtube_video_link_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
                @endif
                <!-- ===== End Pro day --->

                <!-- ===== Throwing mechanic ===== -->
                @if(isset($throwing_mechanic_feature_video_youtube_video_link_clean_video_id))
                <section id="feature_video" class="image_sec">
                    <div class="container">
                        <div class="feature_textt">
                            <h4>THROWING MECHANIC (FEATURE VIDEO)</h4>
                        </div>
                        <div class="row" id="throwing_mechanic_feature_video_youtube_video_content_mobile">
                            @if(isset($throwing_mechanic_feature_video_youtube_video_link_clean_video_id))
                                <div class="col-xl-6 col-lg-6 highlight_video">
                                    <iframe id="video_h" src="https://www.youtube.com/embed/{{ $throwing_mechanic_feature_video_youtube_video_link_clean_video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
                @endif
                <!-- ===== End Throwing mechanic ===== -->

                <div class="contact">
                    <div class="connect-profi" style="margin: 50px 0px;">
                        <h5>CONNECT</h5>
                        <div class="Recruit’s social_media_icons">
                            @if($profile->instagram)
                            <a href="https://www.instagram.com/{{ $profile->instagram }}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($profile->twitter)
                            <a href="https://twitter.com/{{ $profile->twitter }}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($profile->tiktok)
                            <a href="https://www.tiktok.com/{{ '@'.$profile->tiktok }}"><i class="fab fa-tiktok"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="contact-info" style="margin: 50px 0px;">
                        <h5>CONTACT</h5>
                        <div class="Recruit’s">
                            <p>QB Recruit’s E-mail</p>
                            <h6>
                                @if($email)
                                <a href="mailto:{{ $email }}" style="text-decoration: none; color: #000;">{{ $email }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                        <div class="Recruit’s">
                            <p>QB Recruit’s Phone</p>
                            <h6>
                                @if($phone)
                                <a href="tel:{{ $phone }}" style="text-decoration: none; color: #000;">{{ $phone }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="coach-info" style="margin: 50px 0px;">
                        <div class="Recruit’s">
                            <p>QB Coach’s Name</p>
                            <h6>{{ $coach_name }}</h6>
                        </div>
                        <div class="Recruit’s">
                            <p>QB Coach’s Mobile</p>
                            <h6>
                                @if($coach_phone)
                                <a href="tel:{{ $coach_phone }}" style="text-decoration: none; color: #000;">{{ $coach_phone }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                        <div class="Recruit’s">
                            <p>QB Coach’s E-mail</p>
                            <h6>
                                @if($coach_email)
                                <a href="mailto:{{ $coach_email }}" style="text-decoration: none; color: #000;">{{ $coach_email }}</a>
                                @else
                                -
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="tweets">
                    @if($profile->twitter)
                    <a class="twitter-timeline" id="twitter_widget" href="https://twitter.com/{{ $profile->twitter }}?ref_src=twsrc%5Etfw" data-chrome="noheader nofooter noborders" data-tweet-limit="2" data-show-replies="false">Tweets by {{ $profile->twitter }}</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- ===== PROFILE --->

<!-- ===== feature video --->

<!-- ===== WR magazine --->

<section id="magazine_profile" class="slider">
    <div class="container">
        <div class="feature_text">
            <h4>WRMAG ARTICLES</h4>
        </div>
        <div class="row pictures" id="">
            @foreach($posts_wordpress as $post)
            

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 newman" onclick="window.location.href='{{ $post->link }}'">
                <div class="player_bg_one_down" style="background-image: url('{{ $post->featured_media }}');">
                    <div class="content_upp ">
                        <a href="{{ $post->link }}" class="appointment-bttn scrollto"><span
                                class="d-none d-md-inline">News</span></a>
                        <h4>
                            @if (strpos($post->title->rendered, '&') !== false)
                            {!! html_entity_decode($post->title->rendered) !!}
                            @else
                            {{ $post->title->rendered }}
                            @endif
                        </h4>
                        <!-- Date Format, July 1, 2019 -->
                        <p class="date">{{ date('F j, Y', strtotime($post->date)) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</section>

<!-- =====WR magazine --->

<div class="container">
    <div class="my-5 text-center ">
        <div class="row mb-2">
            <div class="col text-center">
            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div id="lightbox">
                <div class="close-lightbox">
                    <!-- ICON -->
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <div class="lightbox-content">
                    <!-- Image -->
                    <div class="lightbox-image">

                    </div>

                    <!-- Arrows -->
                    <div class="arrows">
                        <div class="arrow arrow-left">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="arrow arrow-right">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>
    .Recruit’s p {
        color: rgb(255, 0, 0);
        font-size: 18px;
        font-family: Raleway;
        font-weight: 600;
        text-align: center;
        margin-bottom: 0px;
    }
    .featured_photos {
        width: 351px;
        height: 351px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .profile_cover_header {
        width: 875px;
        height: 419px;
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (max-width: 600px) {
        .featured_photos {
            width: 291px;
            height: 291px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .dividerr_ {
            margin: 10px 10px 20px;
        }

        .table th {
            font-size: 14px !important;
            font-weight: 700;
        }

        .performance_faq h5 {
            font-size: 25px !important;
        }

        .bordr_two::before {
            display: none;

        }

        .bordr::before {
            display: none;
        }

        .highlights_videos {
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        #section-profile_detail > div > div > div.col-xl-8.col-lg-8.col-sm-12.col-sm.\31 2 > div:nth-child(11) > div > div.col-xl-9.col-lg-9.col-sm-12.col-sm-12 > div {
            display: flex;
            justify-content: space-between;
        }

        #section-profile_detail > div > div > div.col-xl-8.col-lg-8.col-sm-12.col-sm.\31 2 > div:nth-child(12) > div > div.col-xl-9.col-lg-9.col-sm-12.col-sm-12 > div {
            display: flex;
            justify-content: space-between;
        }

        .award {
            margin-left: 0px;
        }

        /* cober-pic debe ir hasta arriba */
        .cober-pic {
            margin-top: 0px;
            padding: 0px !important;
        }

        .featured_photo_div {
            width: 300px !important;
            height: 300px !important;
            margin-left: 10px !important;
            margin-right: 10px !important;
            margin-bottom: 10px !important;
        }

        .row.pictures {
            text-align: center;
            /* margin: 0px 0px 50px !important; */
            margin: 10px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .Recruit’s h6 {
            font-size: 16px;
        }
    }

    /* Tamaño del check de los commits */
    .table td i.fas.fa-check {
        font-size: 20px;
    }

    #tiktok {
		height: 435px;
    	margin-top: -10px;

	}

    .comming_soon {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: row;
        padding: 10px; 
        width: 100%;; 
    }

    .comming_soon > div {
        /* Centrar los elementos */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }


    .box-icon {
        margin-top: -20px;
        /* width: 20%; */
    }

    .newman:hover {
        cursor: pointer;
    }

    @media (min-width: 10px) and (max-width: 660px) {
		#profile_desktop {
			display: none !important;
		}

		#profile_mobile {
			display: flex !important;
		}
	}

    @media (min-width: 661px) {

        #profile_mobile {
            display: none !important;
        }

    }

    .featured_photo_div {
        background: #f1f1f1;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 300px;
        height: 300px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .feature_text, .feature_textt  {
        margin-bottom: 50px;
        margin-top: 60px;
    }

    .highlight_video {
        margin: 10px 0;
        min-height: 350px;
    }

    #featured_photo {
        margin-bottom: 5px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #featured_gallery {
    }

    .masonry_gallery img { 
        max-width: 100%;
        display: block;
        margin-bottom: .5em; 
    }

    .masonry_gallery img:hover {
        /* Animation */
        -webkit-animation: pulse 1s;
        -moz-animation: pulse 1s;
        -o-animation: pulse 1s;
        animation: pulse 1s;

    }
    .masonry_gallery {
        columns: 5 320px;
        column-gap: .5em;
        margin-bottom: 50px;
    }

    /* Lightbox */
    #lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: none;
    }

    #lightbox .lightbox-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 800px;
        height: auto;
        background: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    #lightbox .lightbox-content .lightbox-image {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    #lightbox .lightbox-content .lightbox-image img {
        width: 60%;
        height: auto;
    }

    #lightbox .lightbox-content .lightbox-text {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    #lightbox .lightbox-content .lightbox-text h4 {
        font-size: 24px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        line-height: 26px;
        text-transform: uppercase;
        color: #000;
        text-align: center;
        margin-bottom: 10px;
    }

    #lightbox .lightbox-content .lightbox-text p {
        font-size: 18px;
        font-family: 'Raleway';
        font-weight: 600;
        color: #000;
        line-height: 21px;
        padding-top: 17px;
        border-bottom-color: #898989;
        text-align: center;
    }

    #lightbox .lightbox-content .lightbox-text p.date {
        font-size: 18px;
        font-family: 'Raleway';
        font-weight: 600;
        color: #000;
        line-height: 21px;
        padding-top: 17px;
        border-bottom-color: #898989;
        text-align: center;
    }

    #lightbox .lightbox-content .lightbox-text p.date a {
        color: #000;
    }

    #lightbox .lightbox-content .lightbox-text p.date a:hover {
        color: #000;
    }

    #lightbox .lightbox-content .lightbox-text p.date a:visited {
        color: #000;
    }

    #lightbox .lightbox-content .lightbox-text p.date a:active {
        color: #000;
    }

    .close-lightbox {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 30px;
        height: 30px;
        color: #fff;
        cursor: pointer;
    }

    .close-lightbox:hover {
        color: #000;
    }

    .arrows {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 60px;

    }

    .arrow {
        width: 30px;
        height: 30px;
        background: #fff;
        color: #2DC810;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .header_css {
        /* height: 380px;
        width: 700px; */
        height: 419px;
        max-height: 875px;
    }

    .header_css {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .highlight_video iframe {
        width: 100%;
        height: 100%;
    }

    .measurables_stats {
        margin: 20px 0px !important;
    }

    .academic_stats_row, .prospect_camps_row, .football_career_honors_row, .college_offers_row, .performance_stats_row {
        text-align: center;
    }

    .academic_stats_row > p, .prospect_camps_row > p, .football_career_honors_row > p, .college_offers_row > p, .performance_stats_row >p{
        text-align: center;
    }

    .stats_left, .camps_left, .career_honors_left, /* .offers_left */ {
        border-right: 2px solid #00000038;
    }

    .college_offers_row > h6, .prospect_camps_row > h6, .academic_stats_row  > h6, .football_career_honors_row > h6 {
        font-family: "Work Sans", sans-serif;
        font-weight: 700;
        font-size: 14px !important;
        line-height: 26px;
        color: #212529;
        text-transform: uppercase
    }

    .college_offers_row > p, .prospect_camps_row > p, .academic_stats_row  > p, .football_career_honors_row > p {
        font-family: "Raleway", sans-serif;
        font-weight: 600;
        font-size: 12px !important;
        line-height: 21px;
        color: #636363;
    }

    .academic_stats_row  > p {
        font-size: 10px !important;
    }

    .academic_stats_row  > h6 {
        font-size: 12px !important;
    }

    .performance_stats_row > h6  {
        font-size: 16px !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        color: #000 !important;
        margin: 20px 0px;
    }

    .performance_stats_row > img {
        /* width: 50% !important; */
    }

    /* Media Query max width: 768px */
    @media screen and (max-width: 768px) {
        .campus h5 {
            padding: 17px 10px !important;
            font-size: 20px !important;
        }

        .measure_faq h5, .performance_faq h5 {
            padding: 17px 10px !important;
            font-size: 20px !important;
        }

        .college_offer h5 {
            padding: 17px 10px !important;
            font-size: 20px !important;
        }

        .academic h5 {
            padding: 17px 10px !important;
            font-size: 20px !important;
        }
        .football h5 {
            padding: 17px 10px !important;
            font-size: 20px !important;
        }

        .wonderlic h5 {
            padding: 17px 10px !important;
            font-size: 18px !important;
        }

        i.fas.fa-plus, .football i.fas.fa-plus, .academic i.fas.fa-plus  {
            font-size: 20px;
            padding-top: 22px;
            padding-left: 10px;
            padding-right: 10px;
        }


        #media_highlights > div > div.feature_textt {
            font-size: 20px !important;
        }

        #feature_video > div > div.feature_textt > h4 {
            font-size: 16px !important;
            padding-left: 0px !important;
            text-align: center !important;
        }

        #performance_stats_collapse_mobile > div > div > img {
            width: 50% !important;
        }

        #performance_stats_collapse_mobile > div:nth-child(7) > div > img {
            width: 20% !important;
        }

        #performance_stats_collapse_mobile > div:nth-child(1) > div:nth-child(1) > img {
            width: 35% !important;
        }

        /* #header > nav > div > a.navbar-brand > img {
            visibility: hidden;
        } */

        .profile_detail {
            padding: 152px 0px 34px !important;
        }

    }

    /*PERFORMANCE STATS DESKTOP */
    #performance_stats_collapse > div > div > h6 {
        font-size: 25px;
        font-weight: 700;
        line-height: 29px;
        color: #212529;
        font-family: "Work Sans", sans-serif;
    }

    #performance_stats_collapse > div > div > p {
        font-size: 21px;
        font-weight: 600;
        line-height: 32px;
        color: #636363;
        font-family: "RaleWay", sans-serif;
    }

    #performance_stats_collapse > div > div {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #performance_stats_collapse > div > div > img {
        width: 25% !important;
    }

    #performance_stats_collapse > div:nth-child(4) > div > img {
        width: 10% !important;
    }

    #performance_stats_collapse > div:nth-child(1) > div:nth-child(1) > img {
        width: 20% !important;
    }

    /* END PERFORMANCE STATS DESKTOP */

    /*COMING SOON  DESKTOP*/

    .col_box, .coming_box {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .col_box {
        margin-left: 10px;
    }

    .coming_box {
        margin-left: -20px;
    }

    /* END COMING SOON DESKTOP */

    #academic_stats_collapse > div > div > h6, #prospect_camps_collapse > div > div> h6, #college_offers_collapse > div > div > h6, #football_career_honors_div_collapse > div > div > div > h6, #hight_school_stats_div_collapse > div > div > div > h6 {
        font-family: "Work Sans", sans-serif;
        font-size: 22px;
        font-weight: 700;
        line-height: 26px;
        color: #212529;
        text-transform: uppercase;  
    }

    #academic_stats_collapse > div > div > p, #prospect_camps_collapse > div > div > p, #college_offers_collapse > div > div > p, #football_career_honors_div_collapse > div > div > div > p, #hight_school_stats_div_collapse > div > div > div > p {
        font-family: "Raleway", sans-serif;
        font-size: 18px;
        font-weight: 600;
        line-height: 31px;
        color: #636363;
    }

    #academic_stats_collapse > div > div {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }


    .check_commit p {
        text-align: center;
    }

    #college_offers_collapse > div > div.col-2.check_commit > p > i {
        color: #1ea82c;
        font-size: 20px;
    }

    #first_qb {
        margin-top: 20px !important;
    }

    /* Mobile New Layout */
    .profile-header {
        width: 100%;
        background: url('') bottom center no-repeat;
        padding-top: 55px;
        z-index: 500;
        background-size: cover;
    }


    @media screen and (max-width: 767px) {
        .profile-pic {
            margin-bottom: 50px;
        }

        .inner {
            margin-top: 40px;
        }
    }

    .profile-pic {
        border: 2px solid #9ca1a5;
    }

    .profile-pic img {
        max-width: 100%;
    }

    .profile-name {
        background-color: #fff;
        padding: 20px;
    }

    .profile-name h2 {
        font-family: 'Work Sans', sans-serif;
        font-size: 24px;
        font-weight: 900;
        color: #000000;
        margin-bottom: 4px;
    }

    .profile-name h4 {
        font-family: 'Work Sans', sans-serif;
        font-size: 18px;
        font-weight: 600;
        color: #000000;
        margin-bottom: 0;
        margin-top: 8px;
        /* margin: 25px 0 15px; */
    }

    .profile-school {
        margin-top: -25px;
        width: 100%;
        float: none;
        text-align: center;
    }

    .profile-school ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .profile-school ul li {
        width: 100%;
        margin: 5px 0;
        text-align: center;
        float: left;
    }

    #profile_mobile > div.inner.content.container > div > div > div > ul > li{
        display: inline-block;
        font-size: 20px;
        font-weight: bold;
        font-family: 'Work Sans', sans-serif;
        color: #23282d;
    }

    .social_media_icons {
        text-align: center;
        margin-bottom: 20px;
    }

    .social_media_icons a {
        margin: 0 10px;
        color: #000;
        font-size: 30px;
        font-weight: bold;
    }

    .columns_images {
        margin-top: -10px !important;
    }

    .logo_profile {
        /* Center the image */
        width: 100%;
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 20px;

    }

    .logo_profile img {
        width:30%;
    }

    .left-2nd h6 {
        font-family: 'Work Sans', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: #212529;
        text-transform: uppercase;
    }

    .spacer {
        height: 400px;
    }

    section#magazine_profile .player_bg_one_down {
        height: 399px !important;
    }

</style>
@stop

@section('js')
<!-- Jquery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{ asset('template/assets/js/jquery.fitvids.js') }}"></script>
<script>
    $(document).ready(function () {
        // Target your .container, .wrapper, .post, etc.
        $("#thing-with-videos").fitVids();
        $("#pro_day_feature_video_youtube_video_content").fitVids();
        $("#pro_day_feature_video_youtube_video_content_mobile").fitVids();
        $("#throwing_mechanic_feature_video_youtube_video_content").fitVids();
        $("#throwing_mechanic_feature_video_youtube_video_content_mobile").fitVids();
    });
</script>
<script>
    $('.masonry_gallery img').click(function(){
        var image_url = $(this).attr('src');
        //Open lightbox
        $('#lightbox').fadeIn(300);
        $('.lightbox-image').html(`
            <img src="${image_url}" alt="">
        `);
    });
</script>
<script>

// Close lightbox
$('#lightbox').on('click', '.close-lightbox', function() {
    $('#lightbox').fadeOut(300);
});

const arrow_left = document.getElementsByClassName('arrow-left');
const arrow_right = document.getElementsByClassName('arrow-right');

function saveMasonryPhotos () {
    var masonry_photos = [];
    $('.masonry_gallery img').each(function() {
        masonry_photos.push($(this).attr('src'));
    });

    return masonry_photos;
}

arrow_left[0].addEventListener('click', () => {
    var image_url = $('.lightbox-image img').attr('src');
    let photos = saveMasonryPhotos();
    //Buscamos en las photos la image_url y obtenemos el elemento anterior
    let index = photos.indexOf(image_url);
    if (index > 0) {
        let previous_image = photos[index - 1];
        $('.lightbox-image img').attr('src', previous_image);
    }
});

arrow_right[0].addEventListener('click', () => {
    var image_url = $('.lightbox-image img').attr('src');
    let photos = saveMasonryPhotos();
    //Buscamos en las photos la image_url y obtenemos el elemento siguiente
    let index = photos.indexOf(image_url);
    if (index < photos.length - 1) {
        let next_image = photos[index + 1];
        $('.lightbox-image img').attr('src', next_image);
    }
});
</script>

@if($height || $hand_size || $weight || $arm_length || $wing_span || $feet_size)
    <script>
        const measurables_stats = document.getElementById('measurables_stats');
        const measurables_stats_collapse = document.getElementById('measurables_stats_collapse');

        measurables_stats.addEventListener('click', () => {
            if (measurables_stats_collapse.classList.contains('hidden')) {
                measurables_stats_collapse.classList.remove('hidden');
            } else {
                measurables_stats_collapse.classList.add('hidden');
            }
        });

        const measurables_stats_mobile = document.getElementById('measurables_stats_mobile');
        const measurables_stats_collapse_mobile = document.getElementById('measurables_stats_collapse_mobile');

        measurables_stats_mobile.addEventListener('click', () => {
            if (measurables_stats_collapse_mobile.classList.contains('hidden')) {
                measurables_stats_collapse_mobile.classList.remove('hidden');
            } else {
                measurables_stats_collapse_mobile.classList.add('hidden');
            }
        });

    </script>
@endif

@if($forty_yard_dash || $brench_press || $strength_squat || $vertical_jump || $broad_jump || $three_cone_drill || $twenty_yard_shuttle)
<script>
    const show_performance_stats = document.getElementById('show_performance_stats');
    const performance_stats_collapse = document.getElementById('performance_stats_collapse');

    show_performance_stats.addEventListener('click', () => {
        if (performance_stats_collapse.classList.contains('hidden')) {
            performance_stats_collapse.classList.remove('hidden');
            //Add 30px margin bottom to performance_stats_collapse
            performance_stats_collapse.style.marginBottom = '30px';
        } else {
            performance_stats_collapse.classList.add('hidden');
        }
    });

    const show_performance_stats_mobile = document.getElementById('show_performance_stats_mobile');
    const performance_stats_collapse_mobile = document.getElementById('performance_stats_collapse_mobile');

    show_performance_stats_mobile.addEventListener('click', () => {
        if (performance_stats_collapse_mobile.classList.contains('hidden')) {
            performance_stats_collapse_mobile.classList.remove('hidden');
            //Add 30px margin bottom to performance_stats_collapse
            performance_stats_collapse_mobile.style.marginBottom = '30px';
        } else {
            performance_stats_collapse_mobile.classList.add('hidden');
        }
    });
</script>
@endif

@if($graduation_class_year || $school_name || $city || $state || $current_gpa_academic || $sat_score || $atc_score || $year_academic || $name_of_the_honor_or_award)
<script>
    const academic_stats = document.getElementById('academic_stats');
    const academic_stats_collapse = document.getElementById('academic_stats_collapse');

    academic_stats.addEventListener('click', () => {
        if (academic_stats_collapse.classList.contains('hidden')) {
            //Show with animation the collapse
            academic_stats_collapse.classList.remove('hidden');
            academic_stats_collapse.style.marginBottom = '30px';


        } else {
            academic_stats_collapse.classList.add('hidden');
        }
    });

    const academic_stats_mobile = document.getElementById('academic_stats_mobile');
    const academic_stats_collapse_mobile = document.getElementById('academic_stats_collapse_mobile');

    academic_stats_mobile.addEventListener('click', () => {
        if (academic_stats_collapse_mobile.classList.contains('hidden')) {
            academic_stats_collapse_mobile.classList.remove('hidden');
            academic_stats_collapse_mobile.style.marginBottom = '30px';
        } else {
            academic_stats_collapse_mobile.classList.add('hidden');
        }
    });
</script>
@endif

@if($show_college_offers)
<script>
    const college_offers = document.getElementById('college_offers');
    const college_offers_collapse = document.getElementById('college_offers_collapse');

    college_offers.addEventListener('click', () => {
        if (college_offers_collapse.classList.contains('hidden')) {
            college_offers_collapse.classList.remove('hidden');
            college_offers_collapse.style.marginBottom = '30px';
        } else {
            college_offers_collapse.classList.add('hidden');
        }
    });

    const college_offers_mobile = document.getElementById('college_offers_mobile');
    const college_offers_collapse_mobile = document.getElementById('college_offers_collapse_mobile');

    college_offers_mobile.addEventListener('click', () => {
        if (college_offers_collapse_mobile.classList.contains('hidden')) {
            college_offers_collapse_mobile.classList.remove('hidden');
            college_offers_collapse_mobile.style.marginBottom = '30px';
        } else {
            college_offers_collapse_mobile.classList.add('hidden');
        }
    });
</script>
@endif

@if($show_prospect_camps)
<script>
    const prospect_camps = document.getElementById('prospect_camps');
    const prospect_camps_collapse = document.getElementById('prospect_camps_collapse');

    prospect_camps.addEventListener('click', () => {
        if (prospect_camps_collapse.classList.contains('hidden')) {
            prospect_camps_collapse.classList.remove('hidden');
            prospect_camps_collapse.style.marginBottom = '30px';
        } else {
            prospect_camps_collapse.classList.add('hidden');
        }
    });

    const prospect_camps_mobile = document.getElementById('prospect_camps_mobile');
    const prospect_camps_collapse_mobile = document.getElementById('prospect_camps_collapse_mobile');

    prospect_camps_mobile.addEventListener('click', () => {
        if (prospect_camps_collapse_mobile.classList.contains('hidden')) {
            prospect_camps_collapse_mobile.classList.remove('hidden');
            prospect_camps_collapse_mobile.style.marginBottom = '30px';
        } else {
            prospect_camps_collapse_mobile.classList.add('hidden');
        }
    });
</script>
@endif

@if($show_football_career_honors)
<script>
    const football_career_honors_div = document.getElementById('football_career_honors_div');
    const football_career_honors_div_collapse = document.getElementById('football_career_honors_div_collapse');

    football_career_honors_div.addEventListener('click', () => {
        if (football_career_honors_div_collapse.classList.contains('hidden')) {
            football_career_honors_div_collapse.classList.remove('hidden');
            football_career_honors_div_collapse.style.marginBottom = '30px';
        } else {
            football_career_honors_div_collapse.classList.add('hidden');
        }
    });

    const football_career_honors_div_mobile = document.getElementById('football_career_honors_div_mobile');
    const football_career_honors_div_collapse_mobile = document.getElementById('football_career_honors_div_collapse_mobile');

    football_career_honors_div_mobile.addEventListener('click', () => {
        if (football_career_honors_div_collapse_mobile.classList.contains('hidden')) {
            football_career_honors_div_collapse_mobile.classList.remove('hidden');
            football_career_honors_div_collapse_mobile.style.marginBottom = '30px';
        } else {
            football_career_honors_div_collapse_mobile.classList.add('hidden');
        }
    });

</script>
@endif

@if($wonderlic_practice_test)
<script>
    const wonderlic_practice_div = document.getElementById('wonderlic_practice_div');
    const wonderlic_practice_div_collapse = document.getElementById('wonderlic_practice_div_collapase');

    wonderlic_practice_div.addEventListener('click', () => {
        if (wonderlic_practice_div_collapse.classList.contains('hidden')) {
            wonderlic_practice_div_collapse.classList.remove('hidden');
            wonderlic_practice_div_collapse.style.marginBottom = '30px';
        } else {
            wonderlic_practice_div_collapse.classList.add('hidden');
        }
    });

    const wonderlic_practice_div_mobile = document.getElementById('wonderlic_practice_div_mobile');
    const wonderlic_practice_div_collapse_mobile = document.getElementById('wonderlic_practice_div_collapse_mobile');

    wonderlic_practice_div_mobile.addEventListener('click', () => {
        if (wonderlic_practice_div_collapse_mobile.classList.contains('hidden')) {
            wonderlic_practice_div_collapse_mobile.classList.remove('hidden');
            wonderlic_practice_div_collapse_mobile.style.marginBottom = '30px';
        } else {
            wonderlic_practice_div_collapse_mobile.classList.add('hidden');
        }
    });
</script>
@endif

@if($show_hight_school_stats)
<script>
    const hight_school_stats_div = document.getElementById('hight_school_stats_div');
    const hight_school_stats_div_collapse = document.getElementById('hight_school_stats_div_collapse');

    hight_school_stats_div.addEventListener('click', () => {
        if (hight_school_stats_div_collapse.classList.contains('hidden')) {
            hight_school_stats_div_collapse.classList.remove('hidden');
            hight_school_stats_div_collapse.style.marginBottom = '30px';
        } else {
            hight_school_stats_div_collapse.classList.add('hidden');
        }
    });

    const hight_school_stats_div_mobile = document.getElementById('hight_school_stats_div_mobile');
    const hight_school_stats_div_collapse_mobile = document.getElementById('hight_school_stats_div_collapse_mobile');

    hight_school_stats_div_mobile.addEventListener('click', () => {
        if (hight_school_stats_div_collapse_mobile.classList.contains('hidden')) {
            hight_school_stats_div_collapse_mobile.classList.remove('hidden');
            hight_school_stats_div_collapse_mobile.style.marginBottom = '30px';
        } else {
            hight_school_stats_div_collapse_mobile.classList.add('hidden');
        }
    });

</script>
@endif

@stop