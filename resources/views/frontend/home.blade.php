@extends('layouts.frontend')
@section('title', 'WRMag - Index')
@section('content')


    <!-- ======= Hero Section ======= -->

    <section id="banner" class="home_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-xm-12">
                    <p class="build">Build your profile</p>
                    <h2 class="white_title">CONTROL YOUR </h2>
                    <h1 class="red_title">BRAND</h1>
                    <p class="content">The WRMag is the only digital platform built specifically for
                        aspiring college quarterbacks to maximize their recruiting exposure through social media
                        marketing.<br><br>
                        {{-- The way it works is simple. Athletes can leverage our platforms, 
						and our team’s extensive marketing know-how and the wide-reach of our 
						online platform to gain increased exposure. --}}</p>
                    <!-- <a href="{{ url('sign-up') }}" class="appointment-bttn scrollto"><span class="d-none d-md-inline">FREE SIGN
                               UP</span></a> -->
                </div>
                <div class="col-xl-4 col-xm-12">
                </div>
            </div>
        </div>
    </section>



    <!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <span class="content-color">TAKE care of your brand, BETTER your brand, and MAXIMIZE your
                                recruitment process.
                        </p>
                    </div>
                </div>
            </div>

        </section>
        <!-- End Why Us Section -->

        <!-- ======= digital recruiting profile Section ======= -->
        <style>
            #section-profile>div>div>div>div.col-xl-5.col-lg-4.col-sm-12.col-xs-12 {
                display: flex;
                flex-direction: column;
                align-items: start;
                justify-content: center;
            }

            #section-profile>div>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12 {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            #section-profile>div>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12>img {
                max-width: 90%;
            }

            #section-profile > div > div > div > div.col-xl-5.col-lg-5.col-sm-12.col-xs-12 > img {
                max-width: 100%;
                overflow: hidden;
            }

            #section-profile > div > div > div > div.col-xl-4.col-lg-3.col-sm-12.col-xs-12 > h3 {
                overflow-wrap: break-word;
            }

            #section-profile > div > div > div > div.col-xl-4.col-lg-3.col-sm-12.col-xs-12 > a {
                    width: 140px;
            }

            @media (max-width: 768px) {
                #section-profile > div > div > div > div.col-xl-5.col-lg-5.col-sm-12.col-xs-12 > img {
                    margin: 50px 0;
                }

                #section-profile > div > div > div > div.col-xl-4.col-lg-3.col-sm-12.col-xs-12 > a {
                    width: 99.6094px;
                }
            }
        </style>
        <section id="section-profile" class="about build-profile">

            <div class="container">
                <div class="inner-container">
                    {{-- <div class="main-content">
						<h6>digital recruiting profile<h6>
					</div> --}}
                    <div class="row">

                        <div class="col-xl-4 col-lg-3 col-sm-12 col-xs-12 d-flex flex-column align-items-stretch justify-content-center">
                            <h3>BUILD YOUR PROFILE</h3>
                            <p>The WRMAG allows athletes to build their digital recruiting profile in a
                                few simple steps. Input your personal info, stats, and photos/video to feature on your
                                personal digital profile built for the modern day quarterback.</p>
                            <a href="{{ url('sign-up') }}" class="btn-get-started appointment-bttn scrollto"> SIGN UP</a>

                        </div>
                        <div class="col-xl-5 col-lg-5 col-sm-12 col-xs-12">
                            <img src="{{ asset('template/assets/img/Multi-Device-Website.png') }}" class="img-fluid" style="width: 100%">
                        </div>
                        <div
                            class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 icon-boxes d-flex flex-column align-items-stretch justify-content-center">
                            <span class="rows-com">Sign up for a <br><b class="bold">FREE</b> Profile.</span>

                            <span class="rows-unique">exposure through <b class="bold">social media</b>
                                marketing.</span>

                            <span class="rows-yellow">add personal info, <b class="bold">stats,</b> and media. </span>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- End digital recruiting profile Section -->


        <!-- =======  TAKE care of your brand  Section ======= -->
        <section id="about" class="about control_brand">

            <div class="row full_row">
                <div class=" col-lg-6    align-items-stretch justify-content-center bg_img">

                </div>
                <div class=" col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center red_box ">
                    {{-- <div class="main-content"><span>TAKE care of<br> your brand</span></div> --}}
                    <h3>Control your Brand</h3>
                    <p>A lot has changed in the past decade in the world of college athletic recruitment; and it
                        continues to constantly change. In the current digital landscape, the athlete is building and
                        promoting their own brand to prospective recruiters and college coaches. It is extremely
                        important for the athlete to have control over their brand to best display it to recruiters. We
                        want you to <b>TAKE</b> care of your brand,<b> BETTER</b> your brand, and <b>MAXIMIZE</b> your
                        recruitment opportunities with the WRMag’s unlimited potential platforms.</p>
                </div>
            </div>


        </section>

        <!-- ===== End TAKE care of your brand section --->


        <!-- =======  MARKET YOUR RECRUITMENT ======= -->
        <section id="section_four" class="section_four_bg">
            <div class="container">
                {{-- <div class="main-content"><span>TAKE care of<br> your brand</span></div> --}}
                <div class="row">
                    <div class="col-lg-5 col-sm-12">
                        <h3>MARKET YOUR RECRUITMENT</h3>
                    </div>
                    <!-- <div class="col-7">
                             </div> -->
                </div>
                <div class="row">
                    <div class="col-xl-6 col-xs-12 left_con">

                        <p class="contentt">At the WRMag our members are our family and we want our
                            family to succeed. We want our family to utilize our platforms to get the maximum exposure
                            possible leading to college recruitment.
                            We’re
                            the ONLY Quarterback recruiting platform to offer our own in-house digital magazine along
                            with a wide-reaching social media network that continues to grow. WRMag has also
                            been
                            featured by publications like Sports Illustrated, Bleacher Report, SportsCenter ESPN, and is
                            also known internationally.</p>
                        <div class="button-memberships">
                            <a href="{{ url('memberships') }}" id="btn_memberships"
                                class="btn-get-started appointment-bttn scrollto">LEARN ABOUT
                                OUR
                                MEMBERSHIPS</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xs-12 right_con">
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== End MARKET YOUR RECRUITMENT --->

        <!-- ===== QUARTERBACK PROFILES --->

        <section id="section_red" class="section_red_bg">
            <div class="container">
                {{-- <div class="main-contentt"><span></span></div> --}}
                <div class="row">
                    <div class="col-12">
                        <h3>QUARTERBACK PROFILES</h3>
                    </div>
                </div>
                <form action="{{ url('search-profiles') }}" method="GET">
                    <div class="row profiles">
                        <h6 class="filter_pro">Filter By:</h6>
                        <div class="col-xl-2 col-xs-6 pro">
                            {{-- <p class="select outline">Class</p> --}}
                            <select class="form-control profiles-select" name="recruiting_class_of"
                                id="recruiting_class_of">
                                <option value="" selected>Class</option>
                                @foreach ($classes as $class)
                                    @if ($class['recruiting_class_of'] != null)
                                        <option value="{{ $class['recruiting_class_of'] }}">
                                            {{ $class['recruiting_class_of'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 col-xs-6 pro">
                            {{-- <p class="select outline">Position</p> --}}
                            <select class="form-control profiles-select" name="position" id="position">
                                <option value="" selected>Position</option>
                                @foreach ($positions as $position)
                                    @if ($position['position'] != null)
                                        <option value="{{ $position['position'] }}">{{ $position['position'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 col-xs-6 pro">
                            {{-- <p class="select outline">State</p> --}}
                            <select class="form-control profiles-select" name="state" id="state">
                                <option value="" selected>State</option>
                                @foreach ($states as $state)
                                    @if ($state['State'] != null)
                                        <option value="{{ $state['State'] }}">{{ $state['State'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-4 col-xs-6 pro">
                            {{-- <p class="selectt outline">Quarterback Search</p> --}}
                            <input type="text" class="form-control profiles-text" name="quarterback_search"
                                id="quarterback_search" placeholder="Quarterback Search">
                        </div>
                        <div class="col-xl-2 col-xs-12 pro">
                            <button class="bttnn" id="search_class_position_state_qb">GO</button>
                        </div>
                    </div>
                </form>
                <!-- Profiles in a div with scrollbar -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-xs-12">
                        <div class="scroll-buttons">
                            <button class="scroll-button scroll-left" id="scroll-left"><i
                                    class="fas fa-chevron-left"></i></button>
                            <button class="scroll-button scroll-right" id="scroll-right"><i
                                    class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px" id="profiles-mobile">
                    <div class="col-xl-12 col-lg-12 col-xs-12">
                        <div class="scrollbar scrollbar-primary" id="profiles_scroll">
                            <div class="force-overflow">
                                @foreach ($profiles as $profile)
                                    {{-- {{ dd($profile->profile['id']	) }} --}}
                                    <div class="card-content" data-id="{{ $profile->id }}">
                                        <div class="featured-qb"
                                            onclick="window.location.href='{{ url('/profile/' . $profile->slug) }}'">
                                            @if ($profile->profile_photo)
                                                <div class="featured-qb-img"
                                                    style="background-image: url('{{ asset('storage/' . $profile->profile_photo) }}')">
                                                @else
                                                    <div class="featured-qb-img"
                                                        style="background-image: url('{{ asset('template/assets/img/user_p.png') }}')">
                                            @endif
                                            <a href="{{ url('/profile/' . $profile->slug) }}">
                                                @if ($profile->profile_photo)
                                                    <img src="{{ asset('storage/' . $profile->profile_photo) }}"
                                                        style="visibility: hidden">
                                                @else
                                                    <img src="{{ asset('template/assets/img/user_p.png') }}"
                                                        style="visibility: hidden">
                                                @endif
                                            </a>
                                            <span class="qbhl-tag pro-style">{{ $profile->position }}</span>
                                        </div>
                                        <div class="featured-details">
                                            <div class="featured-info">
                                                <p class="featured-name"><a
                                                        href="{{ url('/profile/' . $profile->slug) }}">
                                                        {{ $profile->f_name . ' ' . $profile->l_name }}</a></p>
                                                <p class="featured-date">Class of {{ $profile->recruiting_class_of }}</p>
                                                <!-- University Name -->
                                                <?php
                                                /* if($profile->university) {
                                                                                                                                                                                                                                                                                                															$university = $profile->university->name ? $profile->university->name : false;
                                                                                                                                                                                                                                                                                                														} else {
                                                                                                                                                                                                                                                                                                															$university = false;
                                                                                                                                                                                                                                                                                                														} */
                                                ?>
                                                @if ($profile->academic)
                                                    @if ($profile->academic['school_name'])
                                                        <p class="featured-university">
                                                            {{ $profile->academic['school_name'] }}</p>
                                                    @endif
                                                @endif
                                                <p class="featured-extra">
                                                    @if ($profile->city || $profile->state)
                                                        {{ $profile->city }}, {{ $profile->state }}
                                                    @endif
                                                </p>
                                                {{-- <p class="featured-stars">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
													</p> --}}
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="display: flex; justify-content:center; align-items:center;">
                    <button class="buttn" type="button" id="view-profiles">view all profiles</button>
                </div>
            </div>
            </div>
        </section>



        <!-- ===== end QUARTERBACK PROFILES --->


        <!-- ===== the magazine--->



        <section id="section_six" class="section_six_bg">
            <div class="container">
                {{-- <div class="main-content"><span>Trending Articles</span></div> --}}
                <div class="row">
                    <div class="col-12">
                        <h3>THE MAGAZINE</h3>
                    </div>
                </div>
                <div class="row magazine">
                    <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 player_bg article_home" id="magazine_one">
                        <div class="content_up">
                            <a href="#signup" class="appointment-bttn scrollto"><span
                                    class="d-none d-md-inline">News</span></a>
                            <h4>Holbrook Holds It Down</h4>
                            <p class="date">April 25, 2016</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 newman" id="magazine_two">
                        <div class="player_bg_one article_home">
                            <div class="content_upp">
                                <a href="#signup" class="appointment-bttn scrollto"><span
                                        class="d-none d-md-inline">News</span></a>
                                <h4>California Dime-ing</h4>
                                <p class="date">April 25, 2016</p>
                            </div>
                        </div>
                        <div class="player_bg_one_down article_home">
                            <div class="content_upp con_space">
                                <a href="#signup" class="appointment-bttn scrollto"><span
                                        class="d-none d-md-inline">News</span></a>
                                <h4>Second Times the Charm</h4>
                                <p class="date">April 25, 2016</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12  troffe" id="magazine_three">
                        <div class="player_bg_two article_home">
                            <div class="content_upp">
                                <a href="#signup" class="appointment-bttn scrollto"><span
                                        class="d-none d-md-inline">News</span></a>
                                <h4>A Quarterback of Tomo..</h4>
                                <p class="date">April 25, 2016</p>
                            </div>
                        </div>
                        <div class="player_bg_two_down article_home">
                            <div class="content_upp con_space">
                                <a href="#signup" class="appointment-bttn scrollto"><span
                                        class="d-none d-md-inline">News</span></a>
                                <h4>Second Times the Charm
                                </h4>
                                <p class="date">April 25, 2016</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row end_btn">
                    <div class="col-12">

                        <button class="appointment-bttn scrollto center" id="view_more_articles">VIEW MORE
                            ARTICLES</button>
                    </div>
                </div>
            </div>

        </section>


        <!-- ===== end the magazine--->


        <!-- ===== market your recruitment?--->

        <section id="section_seven" class="section_seven_bg">
            <div class="">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 ">
                        <img src="{{ asset('template/assets/img/2player.png') }}" alt="">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12  middle_con">
                        <h4> WANT TO</h4>
                        <h1>market your <br><span class="colr" style="font-family: 'Work Sans';">recruitment?</span>
                        </h1>
                        <div class="check">
                            <button class="appointment-bttn scrollto center" id="check_it_out">FREE SIGN UP</button>
                        </div>
                        <p class="justify-content-center">SIGN UP FOR A FREE PROFILE, OR CHOOSE ONE OF OUR MEMBERSHIPS
                            TO
                            START YOUR RECRUITING BUSINESS TODAY.<br><br>

                            THIS IS AN INVESTMENT IN YOUR FUTURE ATHLETIC SUCCESS AND WE’RE
                            EXCITED TO BE WORKING WITH YOU ON YOUR JOURNEY.</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12  football_img">
                        <img src="{{ asset('template/assets/img/3player.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>





        <!-- ===== market your recruitment?--->


    </main><!-- End #main -->

@endsection

@section('css')


    <style>
        #tiktok {
            height: 435px;
            margin-top: -10px;

        }

        .profiles-select {
            font-weight: bold;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
            border: 2px solid #808080;
            background: #e5e5e5 url("{{ asset('template/assets/img/arrow-up-icon-23.png') }}") no-repeat;
            background-size: 15px !important;
            background-position: right 10px center !important;
        }

        .profiles-text {
            font-weight: bold;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
            border: 2px solid #808080;
        }

        .profiles-text::placeholder {
            font-weight: bold;
            color: black !important;
            font-size: 20px;
            padding: 10px;
        }

        .bttnn {
            margin-top: 20px;
        }

        .profiles-text:focus {
            border: 2px solid #808080;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
        }

        .profiles-select:focus {
            border: 2px solid #808080;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
        }

        /* CAMBIOS ANNEL */


        /*A todos los botones ponerle font-family: 'Montserrat', sans-serif;*/
        .appointment-bttn {
            /* font-family: 'Montserrat', sans-serif !important; */
        }

        button {
            font-family: 'Montserrat', sans-serif !important;
        }

        .d-md-inline {
            /* font-family: 'Montserrat', sans-serif !important; */
        }

        #banner>div>div {
            padding-top: 100px;
        }

        #banner>div>div>div.col-xl-8.col-xm-12>p.build {
            font-weight: 500 !important;
        }

        #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h1>span {
            font-size: 50px;
        }

        #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h4 {
            font-weight: 900;
        }

        #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h1 {
            font-weight: 900;
        }

        @media only screen and (max-width: 600px) {
            .hidden-phone {
                display: none;
            }

            .card-profile {
                margin-left: -18px;
            }

            .ig,
            .instaa {
                margin-top: 50px !important;
                margin-bottom: 50px !important;
            }

            .different_profiles .col-xl-3.col-lg-3.col-xs-12 {
                margin-left: -5px !important;
            }

            #section-profile,
            #why-us,
            #about,
            #section_four,
            #section_red,
            #section_five,
            #section_six,
            #section_seven {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .magazine {
                margin-top: 60px;
                margin-left: 10px;
                margin-right: 10px;
            }

            .red_box {
                padding: 20px 20px 20px 20px;
            }

            .build-profile .main-content h6 {
                padding-left: 10px;
            }

            h2.white_title {
                line-height: 28px;
            }

            section#why-us p {
                font-family: Work Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                line-height: 23px;
                text-align: center;
                color: #fff;
                margin-bottom: 0px;
            }

            .inner-container-left p {
                line-height: 28px;
            }

            #about>div>div.col-lg-6.icon-boxes.d-flex.flex-column.align-items-stretch.justify-content-center.red_box>div::before {
                margin-left: -15px !important;
            }

            #section_four>div>div.main-content::before {
                margin-left: -15px !important;
            }

            #section_seven>div>div>div:nth-child(1) {
                display: none;
            }

            #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.football_img {
                display: none;
            }

            #section_red>div>form {
                display: none;
            }

            .images {
                margin-bottom: -150px;
            }

            #section_five>div>div.main-content {
                margin-left: 20px;
            }

            #section_red>div>div.main-contentt {
                margin-left: 20px;
            }

            #section_red>div>div.main-contentt::before {
                margin-left: -15px !important;
            }

            .main-content:before {
                margin-left: -15px !important;
            }

            #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h1>span {
                font-size: 40px;
            }

            .bg_whitee p {
                font-size: 15px;
            }

            .bg_whitee {
                width: 60% !important;
            }

            .bg_black {
                width: 35% !important;
            }

            #profile_button {
                font-size: 15px;

            }

            #profile_stars {
                font-size: 15px;
            }

            #section-profile>div>div>div.row>div.col-lg-4.icon-boxes.d-flex.flex-column.align-items-stretch.justify-content-center>img {
                width: 300px !important;
            }

            #section-profile>div>div>div.row>div.col-lg-4.icon-boxes.d-flex.flex-column.align-items-stretch.justify-content-center {
                align-content: center !important;
                align-items: center !important;
                justify-content: center !important;
            }

            /* .article_home {
                           min-height: 350px !important;
                           margin-bottom: 5px !important;

                          } */

            #magazine_one,
            #magazine_two,
            #magazine_three,
            #magazine_four,
            #magazine_five {
                min-height: 370px !important;
                margin-bottom: 5px !important;
            }

            .content_upp {
                padding: 200px 22px 10px !important;
            }

            .content_up {
                padding: 200px 22px 10px !important;
            }

            .home_banner {
                background: #fff !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>p.build {
                color: #000 !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>h2 {
                color: #000 !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>h1 {
                color: #000 !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>p.content {
                margin-top: 50px !important;
                color: #000 !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>a,
            #section-profile>div>div>div>div.col-xl-3.col-lg-4.col-sm-12.col-xs-12.inner-container-left.inner-container-left-part.align-items-stretch.justify-content-center>a {
                width: 100%;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #view_more_articles,
            #check_it_out,
            #view-profiles {
                width: 100%;
            }

            p.contentt {
                padding-right: 0px !important;
            }

            .control_brand p {
                padding-right: 0px !important;
            }

            #section-profile>div>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12>img {
                max-width: 90%;
                margin-top: 50px !important;
            }

            #section-profile>div>div>div>div.col-xl-5.col-lg-4.col-sm-12.col-xs-12>a {
                width: 100%;
                text-align: center;
            }

        }

        p.build {
            color: #fff;
        }

        h1.red_title {
            color: #fff;
        }

        /* 1920 x 1080 Pantalla Grande */
        /* 1360 x 768 Pantalla Mediana */
        @media only screen and (min-width: 1370px) and (max-width: 1920px) {

            /* .red_box {
                           background-color: #88151E;
                           padding: 77px 50px 120px 329px;
                          }
                          .container {
                           width: 1500px !important;
                          }  */


        }

        /* Media query for 1920 x 1080 */
        @media only screen and (min-width: 1920px) {
            .red_box {
                background-color: #88151E;
                padding: 77px 329px 120px 50px !important;
            }

            .container {
                width: 1500px !important;
            }

            .main-content:before {
                /* margin-left: -5px; */
            }
        }


        @media (max-width: 767px) {
            .different_profiles .col-xl-3.col-lg-3.col-xs-12 {
                padding-right: 2px;
                padding-bottom: 15px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            #about {
                background-color: #88151E;
            }

            h1.red_title {
                margin-bottom: 50px;
            }

            #banner>div>div>div.col-xl-8.col-xm-12 {
                margin-top: -180px !important;
            }

            p.build {
                font-size: 24px !important;
            }

            h2.white_title {
                font-size: 35px !important;
                line-height: 40px !important
            }

            h1.red_title {
                font-size: 35px !important;
                line-height: 40px !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>p.build {
                font-family: 'Work Sans';
                font-weight: 900 !important;
                margin-bottom: 0px;
                font-size: 35px !important;
                line-height: 40px !important;
                text-transform: uppercase !important;
            }

            .featured-info p {
                line-height: 30px !important;
            }

            .featured-name {
                font-size: 20px !important;

            }

            .button-memberships {
                width: 100% !important;
            }

        }


        .appointment-bttn {
            border: none;
        }

        #search_class_position_state_qb {
            background: #000;
            margin: none !important;
        }

        p.contentt {
            padding-right: 51px;
        }

        /* iPad Mini and ipad Air */
        @media only screen and (min-width: 768px) and (max-width: 1024px) {

            #section-profile>div>div>div.row>div.col-xl-3.col-lg-4.col-sm-12.col-xs-12.inner-container-left.inner-container-left-part.align-items-stretch.justify-content-center {
                width: 100%;
            }
        }


        @media (max-width: 767px) {

            .control_brand .main-content {
                width: 45% !important;
                margin-bottom: 40px !important;
                margin-left: 19px;
                margin-top: 75px !important;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>p.build::after {
                content: "";
                display: block;
                width: 80%;
                height: 1px;
                background-color: rgb(226, 226, 226);
                margin-top: 10px;
            }

            #banner>div>div>div.col-xl-8.col-xm-12>h2 {
                margin-top: 10px;
            }


        }

        .section_red_bg {
            background-color: #fff;
        }

        .section_red_bg h3,
        #section_red>div>form>div>h6 {
            color: #000 !important;
        }


        #about {
            background-color: #2DC810;
        }

        .red_box {
            background-color: #2DC810;
        }

        #view-profiles {
            border: 1px solid #000;
        }
    </style>

    <!-- New Cards -->
    <style>
        .profiles-select {
            font-weight: bold;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
            border: 2px solid #808080;
            background: #e5e5e5 url("{{ asset('template/assets/img/arrow-up-icon-23.png') }}") no-repeat;
            background-size: 15px !important;
            background-position: right 10px center !important;
        }

        .profiles-text {
            font-weight: bold;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
            border: 2px solid #808080;
        }

        .profiles-text::placeholder {
            font-weight: bold;
            color: black !important;
            font-size: 20px;
            padding: 10px;
        }

        .bttnn {
            margin-top: 20px;
        }

        .profiles-text:focus {
            border: 2px solid #808080;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
        }

        .profiles-select:focus {
            border: 2px solid #808080;
            background-color: #e5e5e5;
            color: black;
            font-size: 20px;
            padding: 10px;
        }

        /* Cambios Annel*/
        #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h1>span {
            font-size: 50px;
        }

        #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h4 {
            font-weight: 900;
        }

        #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.middle_con>h1 {
            font-weight: 900;
        }

        .card-content {
            margin-left: 5px;
            margin-right: 5px;
            width: 310px !important;
            /* width: 385px !important; */
            cursor: pointer;
            /* display:flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center; */
        }

        .card-profile {
            display: flex;
            flex-direction: row;
            min-height: 150px !important;
            width: 100%;
        }

        .left {
            background-image: url('{{ asset('template/assets/img/user_p.png') }}');
            /* background-position: center center; */
            background-repeat: no-repeat;
            background-size: cover;
            width: 95%;
            height: 279px;
        }

        .bg_whitee {
            width: 70%;
        }

        .bg_black {
            width: 25%;
        }

        @media only screen and (max-width: 600px) {

            /* *{
                                    overflow-x: hidden;
                                } */

            .icon_bg a i {
                font-size: 16px !important;
                color: #fff;
            }

            #section_red>div>div.row.different_profiles {
                align-content: center !important;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .card-profile {
                margin-left: -18px;
            }

            #check_it_out {
                width: 100%;
            }

            #profiles_desktop {
                display: none !important;
            }

        }

        @media only screen and (min-width: 600px) {
            #profiles-mobile {
                /* display: none !important; */
            }
        }

        @media (max-width: 767px) {

            .different_profiles .col-xl-3.col-lg-3.col-xs-12 {
                padding-right: 2px;
                padding-bottom: 15px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .scroll-buttons {
                margin-top: 20px !important;
                justify-content: center !important;
                align-items: center !important;
                align-content: center !important;
                margin-bottom: -50px !important;
            }

        }

        /* Social Media Icons   */
        .icon_bg {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .icon_bg a {
            margin: 0px 10px;
        }

        .icon_bg a i {
            font-size: 20px;
            color: #fff;
        }

        .icon_bg a:hover {
            color: #fff;
        }

        .star {
            padding: 10px;
            color: #d9c434;
        }

        h6.filter_pro {
            color: #000 !important;
        }

        @media only screen and (max-width: 600px) {

            #section_seven {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            #section_seven>div>div>div:nth-child(1) {
                display: none;
            }

            #section_seven>div>div>div.col-xl-4.col-lg-4.col-sm-12.col-xs-12.football_img {
                display: none;
            }

        }

        #check_it_out {
            border: none !important;
        }

        /* New Cards */
        .featured-qb-img {
            background: #000;
            background-position: inherit;
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;
            position: relative;
            max-height: 250px;
            overflow: hidden;
        }

        .qbhl-tag {
            background-color: #2DC810;
            padding: 2px 30px 0 30px;
            color: #fff;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            line-height: 28px;
            display: inline-block;
            letter-spacing: 1px;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .fa-star {
            color: #d9c434;
            font-size: 16px;
            margin-bottom: 0px;
        }

        .featured-details {
            /* display: flex;
                                flex-direction: row; */
        }

        .featured-info {
            /* border: 1px solid #000; */
            padding: 15px 20px 15px 20px;
            background: #fff;

        }

        .featured-info>p {
            text-align: center;
        }

        .featured,
        .featured-qb {
            width: 100%;
            border: 1px solid #000;
            margin-bottom: 30px;
            min-height: 450px;
        }

        .featured-name {
            font-family: 'Work Sans', sans-serif;
            font-size: 22px;
            font-weight: 900;
            margin-bottom: 0px;
        }

        .featured-date {
            font-family: 'Work Sans', sans-serif;
            font-size: 18px;
            font-weight: 900;
            margin-bottom: 0px;

        }

        .featured-extra {
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0px;
        }

        .featured-university {
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0px;
        }

        .featured-social {
            background-color: #000;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .featured-stars {
            margin-bottom: 0px !important;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        .button-memberships {
            width: 90%;
            /*Centrar el contenido*/
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #btn_memberships {
            margin-top: 15px !important;
            font-weight: 800 !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('template/assets/css/arrows.css') }}">
@stop
@section('js')
    <script>
        //scroll-buttons
        const scroll_left = document.querySelector("#scroll-left");
        const scroll_right = document.querySelector("#scroll-right");

        //Contenedor 
        const profiles_scroll = document.querySelector("#profiles_scroll");

        //Si mantiene presionado el boton de scroll, seguir avanzando
        scroll_left.addEventListener("click", function() {
            profiles_scroll.scrollLeft -= 630;
            //Add class pulse for 0.8s
            scroll_left.classList.add("pulse");
            setTimeout(function() {
                scroll_left.classList.remove("pulse");
            }, 800);
        });
        scroll_right.addEventListener("click", function() {
            profiles_scroll.scrollLeft += 630;
            //Add Animation Pulse
            scroll_right.classList.add("pulse");
            setTimeout(function() {
                scroll_right.classList.remove("pulse");
            }, 800);
        });
    </script>
    <script>
        //Buttons - Redirect
        const view_profiles = document.getElementById('view-profiles');
        view_profiles.addEventListener('click', function() {
            window.location.href = "{{ url('profiles') }}";
        });

        const view_more_articles = document.getElementById('view_more_articles');
        view_more_articles.addEventListener('click', function() {
            window.location.href = "https://wp.quarterbackmagazine.com/";
        });

        const check_it_out = document.getElementById('check_it_out');
        check_it_out.addEventListener('click', function() {
            window.location.href = "{{ url('sign-up') }}";
        });
    </script>



    <script>
        // WordPress API - Get articles
        const url_magazine = 'https://wp.quarterbackmagazine.com/wp-json/wp/v2/posts?per_page=5&?_embed';

        const content_artocles = document.querySelector("#section_six > div > div.row.magazine");



        async function getArticles() {
            let articles_new = [];
            const response = await fetch(url_magazine);
            const data = await response.json();

            data.forEach(post => {
                var image_url = '';
                const title = post.title.rendered;
                const date = new Date(post.date);
                const day = date.getDate();
                const month = date.getMonth();
                const year = date.getFullYear();
                const month_name = date.toLocaleString('en-US', {
                    month: 'long'
                });
                const date_format = month_name + ' ' + day + ', ' + year;
                const link = post.link;
                const link_media_to_fetch = post._links['wp:featuredmedia'][0].href;
                let article = {
                    'title': title,
                    'date': date_format,
                    'link': link,
                    'image': link_media_to_fetch
                }
                articles_new.push(article);
            });

            return articles_new;
        }

        async function addImageArticle() {
            let articles = await getArticles();
            for (let i = 0; i < articles.length; i++) {
                let article = articles[i];
                let image_url = '';
                const image_fetch = await fetch(article.image);
                const image_data = await image_fetch.json();
                image_url = image_data.link;
                articles[i].image = image_url;
            }

            return articles;
        }


        async function drawArticles() {
            const magazine_one = document.querySelector("#magazine_one");
            const magazine_two = document.querySelector("#magazine_two");
            const magazine_three = document.querySelector("#magazine_three");
            const background_magazine_one = document.querySelector("#magazine_one");
            const articles = await addImageArticle();

            magazine_one.innerHTML = '';
            background_magazine_one.style.backgroundImage = `url(${articles[0].image})`;
            magazine_two.innerHTML = '';
            magazine_three.innerHTML = '';
            children_one_magazine_one = `
						<div class="content_up" onclick="window.location.href='${articles[0].link}'">
							<a href="${articles[0].link}" class="appointment-bttn scrollto"><span
									class="d-none d-md-inline">News</span></a>
							<h4>${articles[0].title}</h4>
							<p class="date">${articles[0].date}</p>
						</div>
						`;


            children_one_magazine_two = `
						<div class="player_bg_one" id="magazine_two" style="background-image: url(${articles[1].image});" onclick="window.location.href='${articles[1].link}'">
							<div class="content_upp">
								<a href="${articles[1].link}" class="appointment-bttn scrollto"><span
										class="d-none d-md-inline">News</span></a>
								<h4>${articles[1].title}</h4>
								<p class="date">${articles[1].date}</p>
							</div>
						</div>
						`;

            children_two_magazine_two = `
						<div class="player_bg_one_down" id="magazine_three" style="background-image: url(${articles[2].image});" onclick="window.location.href='${articles[2].link}'">
							<div class="content_upp con_space">
								<a href="${articles[2].link}" class="appointment-bttn scrollto"><span
										class="d-none d-md-inline">News</span></a>
								<h4>${articles[2].title}</h4>
								<p class="date">${articles[2].date}</p>
							</div>
						</div>
						`;

            children_one_magazine_three = `
						<div class="player_bg_two" id="magazine_four" style="background-image: url(${articles[3].image});" onclick="window.location.href='${articles[3].link}'">
							<div class="content_upp">
								<a href="${articles[3].link}" class="appointment-bttn scrollto"><span
										class="d-none d-md-inline">News</span></a>
								<h4>${articles[3].title}</h4>
								<p class="date">${articles[3].date}</p>
							</div>
						</div>
						`;

            children_two_magazine_three = `
						<div class="player_bg_two_down" id="magazine_five" style="background-image: url(${articles[4].image});" onclick="window.location.href='${articles[4].link}'">
							<div class="content_upp con_space">
								<a href="${articles[4].link}" class="appointment-bttn scrollto"><span
										class="d-none d-md-inline">News</span></a>
								<h4>${articles[4].title}	
								</h4>
								<p class="date">${articles[4].date}</p>
							</div>
						</div>
						`;

            magazine_one.innerHTML = children_one_magazine_one;
            magazine_two.innerHTML = children_one_magazine_two + children_two_magazine_two;
            magazine_three.innerHTML = children_one_magazine_three + children_two_magazine_three;
        }

        drawArticles();
    </script>


@stop
