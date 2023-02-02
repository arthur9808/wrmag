@extends('layouts.frontend')
@section('title', 'WRMag - About Profile')
@section('content')

    <section id="media_section" class="about_media">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12 left_proiless">
                    <div class="img_box_last" onclick="window.location.href='{{ url('profile-about/' . $profile->slug) }}'">
                        <a href="{{ url('profile-about/' . $profile->slug) }}"> <img
                                src="{{ asset('template/assets/img/player 3 (1).png') }}" alt=""></a>
                        <p>About</p>
                        @if ($section_locked)
                            <br>
                        @endif
                    </div>
                    <div class="img_box"
                        onclick="window.location.href='{{ url('profile-performance/' . $profile->slug) }}'">
                        <a href="{{ url('profile-performance/' . $profile->slug) }}"><img
                                src="{{ asset('template/assets/img/football 1.png') }}" alt=""></a>
                        <p>
                            Performance
                            {{-- @if ($section_locked) 
                        <!-- UPGRADE BADGE -->
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                        @endif --}}
                        </p>
                        @if ($section_locked)
                            <br>
                        @endif
                    </div>
                    <div class="img_box" onclick="window.location.href='{{ url('profile-academic/' . $profile->slug) }}'">
                        <a href="{{ url('profile-academic/' . $profile->slug) }}"><img
                                src="{{ asset('template/assets/img/Graduation Cap 1.png') }}" alt=""></a>
                        <p>
                            Academic
                            {{-- @if ($section_locked) 
                        <!-- UPGRADE BADGE -->
                        <br>
                        <span class="badge badge-danger badge-red"> 
                            <i class="fas fa-lock"></i>
                            UPGRADE
                        </span>
                        @endif --}}
                        </p>
                        @if ($section_locked)
                            <br>
                        @endif
                    </div>
                    <div class="img_box" onclick="window.location.href='{{ url('profile-media/' . $profile->slug) }}'">
                        <a href="{{ url('profile-media/' . $profile->slug) }}"> <img
                                src="{{ asset('template/assets/img/Artboard 1 1 (1).png') }}" alt=""></a>
                        <p>
                            Media
                            @if ($section_locked)
                                <!-- UPGRADE BADGE -->
                                <br>
                                <span class="badge badge-danger badge-red">
                                    <i class="fas fa-lock"></i>
                                    UPGRADE
                                </span>
                            @endif
                        </p>
                    </div>
                    <!-- NEW LEFT MENU -->
                    @if ($profile->membership->name == 'BEGINNER' || $profile->membership->name == 'PRACTICE SQUAD')
                        <div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
                            <a href="{{ url('memberships') }}"> <img src="{{ asset('template/assets/img/IGiconos.png') }}"
                                    alt=""></a>
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
                    @if ($profile->membership->name == 'BEGINNER')
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
                            <a href="{{ url('memberships') }}"> <img src="{{ asset('template/assets/img/TWiconos.png') }}"
                                    alt=""></a>
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
                    @if ($profile->membership->name == 'BEGINNER' || $profile->membership->name == 'PRACTICE SQUAD')
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
                    <div class="row" id="help_message">
                        <h4 class="featured_photos">Please e-mail <a class="issues_mail"
                                href="mailto:catch@wrmag.com">catch@wrmag.com</a> for any issues
                            </h3>
                    </div>
                    <div class="top_space">
                        <h3 class="featured_photos">About</h3>
                    </div>
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
                    <form action="{{ url('/profile-about') }}" method="POST" enctype="multipart/form-data"
                        id="profile_form">
                        @csrf
                        <div class="">
                            {{-- <div id="i_am_options" class="form-row">
                            <div class="form-group inputtt col">
                                <label for="name">I am a {{ $profile->i_am }}</label>
                                <div class="radio_btn">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="i_am1" name="i_am" id="im_am"
                                            value="Quarterback" @if ($profile->i_am == 'Quarterback') checked @endif>
                                        <label class="form-check-label" for="i_am1">
                                            Quarterback
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="i_am2" name="i_am" id="im_am"
                                            value="Parent" @if ($profile->i_am == 'Parent') checked @endif>
                                        <label class="form-check-label" for="i_am2">
                                            Parent
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                            <!-- Input hidden for profile id -->
                            <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                            <div class="form-row fst_row">
                                <div class="form-group inputtt col">
                                    <label for="name">First Name*</label>
                                    <input type="text" class="form-control" id="input_name" name="f_name"
                                        value="{{ $profile->f_name }}" required>
                                </div>
                                <div class="form-group inputtt col">
                                    <label for="name">Last Name*</label>
                                    <input type="text" class="form-control" id="inputlastname" name="l_name"
                                        value="{{ $profile->l_name }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group inputtt message_area col-12">
                                    <label for="Textarea1">About me</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="biography" rows="5"
                                        placeholder="Tell us more about you">{{ $profile->biography }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="top_space">
                                <h3 class="featured_photoss ">Player Information</h3>
                            </div>
                            <?php
                            /* POSITIONS 1*/
                            $positions_one = ['Pro Style', 'Dual Threat'];
                            /* Status */
                            $status = ['Prospecting', 'Undecided', 'Committed'];
                            /* States */
                            $classes = ['2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030', '2031', '2032', '2033', '2034'];
                            
                            /*Countries */
                            $countries = [
                                'N/A',
                                'Afghanistan',
                                'Albania',
                                'Algeria',
                                'Andorra',
                                'Angola',
                                'Antigua and Barbuda',
                                'Argentina',
                                'Armenia',
                                'Australia',
                                'Austria',
                                'Azerbaijan',
                                'Bahamas',
                                'Bahrain',
                                'Bangladesh',
                                'Barbados',
                                'Belarus',
                                'Belgium',
                                'Belize',
                                'Benin',
                                'Bhutan',
                                'Bolivia',
                                'Bosnia and Herzegovina',
                                'Botswana',
                                'Brazil',
                                'Brunei',
                                'Bulgaria',
                                'Burkina Faso',
                                'Burundi',
                                'Cambodia',
                                'Cameroon',
                                'Canada',
                                'Cape Verde',
                                'Central African Republic',
                                'Chad',
                                'Chile',
                                'China',
                                'Colombia',
                                'Comoros',
                                'Congo (Brazzaville)',
                                'Congo',
                                'Costa Rica',
                                "Cote d'Ivoire",
                                'Croatia',
                                'Cuba',
                                'Cyprus',
                                'Czech Republic',
                                'Denmark',
                                'Djibouti',
                                'Dominica',
                                'Dominican Republic',
                                'East Timor (Timor Timur)',
                                'Ecuador',
                                'Egypt',
                                'El Salvador',
                                'Equatorial Guinea',
                                'Eritrea',
                                'Estonia',
                                'Ethiopia',
                                'Fiji',
                                'Finland',
                                'France',
                                'Gabon',
                                'Gambia, The',
                                'Georgia',
                                'Germany',
                                'Ghana',
                                'Greece',
                                'Grenada',
                                'Guatemala',
                                'Guinea',
                                'Guinea-Bissau',
                                'Guyana',
                                'Haiti',
                                'Honduras',
                                'Hungary',
                                'Iceland',
                                'India',
                                'Indonesia',
                                'Iran',
                                'Iraq',
                                'Ireland',
                                'Israel',
                                'Italy',
                                'Jamaica',
                                'Japan',
                                'Jordan',
                                'Kazakhstan',
                                'Kenya',
                                'Kiribati',
                                'Korea, North',
                                'Korea, South',
                                'Kuwait',
                                'Kyrgyzstan',
                                'Laos',
                                'Latvia',
                                'Lebanon',
                                'Lesotho',
                                'Liberia',
                                'Libya',
                                'Liechtenstein',
                                'Lithuania',
                                'Luxembourg',
                                'Macedonia',
                                'Madagascar',
                                'Malawi',
                                'Malaysia',
                                'Maldives',
                                'Mali',
                                'Malta',
                                'Marshall Islands',
                                'Mauritania',
                                'Mauritius',
                                'Mexico',
                                'Micronesia',
                                'Moldova',
                                'Monaco',
                                'Mongolia',
                                'Morocco',
                                'Mozambique',
                                'Myanmar',
                                'Namibia',
                                'Nauru',
                                'Nepa',
                                'Netherlands',
                                'New Zealand',
                                'Nicaragua',
                                'Niger',
                                'Nigeria',
                                'Norway',
                                'Oman',
                                'Pakistan',
                                'Palau',
                                'Panama',
                                'Papua New Guinea',
                                'Paraguay',
                                'Peru',
                                'Philippines',
                                'Poland',
                                'Portugal',
                                'Qatar',
                                'Romania',
                                'Russia',
                                'Rwanda',
                                'Saint Kitts and Nevis',
                                'Saint Lucia',
                                'Saint Vincent',
                                'Samoa',
                                'San Marino',
                                'Sao Tome and Principe',
                                'Saudi Arabia',
                                'Senegal',
                                'Serbia and Montenegro',
                                'Seychelles',
                                'Sierra Leone',
                                'Singapore',
                                'Slovakia',
                                'Slovenia',
                                'Solomon Islands',
                                'Somalia',
                                'South Africa',
                                'Spain',
                                'Sri Lanka',
                                'Sudan',
                                'Suriname',
                                'Swaziland',
                                'Sweden',
                                'Switzerland',
                                'Syria',
                                'Taiwan',
                                'Tajikistan',
                                'Tanzania',
                                'Thailand',
                                'Togo',
                                'Tonga',
                                'Trinidad and Tobago',
                                'Tunisia',
                                'Turkey',
                                'Turkmenistan',
                                'Tuvalu',
                                'Uganda',
                                'Ukraine',
                                'United Arab Emirates',
                                'United Kingdom',
                                'Uruguay',
                                'Uzbekistan',
                                'Vanuatu',
                                'Vatican City',
                                'Venezuela',
                                'Vietnam',
                                'Yemen',
                                'Zambia',
                                'Zimbabwe',
                            ];
                            ?>
                            <div class="form-row">
                                <div class="form-group inputt_selectt col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="inputselect">Position</label>
                                    <select class="form-select selection" aria-label="select" id="position"
                                        name="position">
                                        @if (!$profile->position)
                                            <option value="" selected>Select a Position</option>
                                        @endif
                                        @foreach ($positions_one as $position)
                                            <option value="{{ $position }}"
                                                @if ($profile->position == $position) selected @endif>{{ $position }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group inputt_selectt col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="year">Recruiting Class</label>
                                    {{-- <input type="number" class="form-control" id="inputyear" name="recruiting_class_of"
                                    placeholder="Ex. 2022" value="{{ $profile->recruiting_class_of }}"> --}}
                                    <select class="form-select selection" aria-label="select" id="inputyear"
                                        name="recruiting_class_of">
                                        @if (!$profile->recruiting_class_of)
                                            <option value="" selected>Select a Year</option>
                                        @endif
                                        @foreach ($classes as $class)
                                            <option value="{{ $class }}"
                                                @if ($profile->recruiting_class_of == $class) selected @endif>{{ $class }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group inputt_selectt col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <label for="inputcollege">College Recruiting Status</label>
                                    <select class="form-select selection" aria-label="select"
                                        name="college_recruiting_status">
                                        @if (!$profile->college_recruiting_status)
                                            <option value="" selected>Please Select</option>
                                        @endif
                                        @foreach ($status as $stat)
                                            <option value="{{ $stat }}"
                                                @if ($profile->college_recruiting_status == $stat) selected @endif>{{ $stat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row fst_row">
                                <div class="form-group inputt_selectt col">
                                    <label for="inputuniversity">Select the University you are COMMITTED OFFICIALLY</label>
                                    <select class="form-select selection" aria-label="select" name="university_id">
                                        @if ($profile->university_id == null)
                                            <option value="" selected>Please Select University</option>
                                        @endif
                                        <!-- Option NA for no university -->
                                        <option value="" @if ($profile->university_id == null) selected @endif>N/A
                                        </option>
                                        @foreach ($universities as $school)
                                            <!-- Si el university_id es null, selecciona el primer elemento de la lista -->
                                            <option value="{{ $school->id }}"
                                                @if ($profile->university_id == $school->id) selected @endif>{{ $school->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>

                        <hr>
                        <div class="top_space">
                            <h3 class="featured_photoss ">Photos</h3>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 cover_photo profile_css mt-4">
                                @if (!$profile->profile_photo)
                                    <img style="background-image: url('{{ asset('template/assets/img/profile-about1.png') }}')"
                                        alt="">
                                @else
                                    <img style="background-image: url('{{ asset('storage/' . $profile->profile_photo) }}')"
                                        alt="">
                                @endif
                                <div class="form-group">
                                    <input type="file" accept="image/*" class="form-control" name="profile_photo">
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 cover_photo header_css mt-4">
                                @if (!$profile->profile_cover_header)
                                    <img style="background-image: url('{{ asset('template/assets/img/profile_about_cover.png') }}')"
                                        alt="">
                                @else
                                    <img style="background-image: url('{{ asset('storage/' . $profile->profile_cover_header) }}')"
                                        alt="">
                                @endif
                                <div class="form-group">
                                    <input type="file" accept="image/*" class="form-control"
                                        name="profile_cover_header">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 100px;">
                            <hr>
                        </div>
                        <div class="top_space">
                            <h3 class="featured_photoss ">Social Media</h3>
                        </div>
                        <div class="form-row socialss fst_row">
                            <div class="form-group inputtt col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <label for="link">Instagram </label>
                                <input type="text" class="form-control" id="input_insta" name="instagram"
                                    placeholder="@user" value="{{ $profile->instagram }}">
                            </div>
                            <div class="form-group inputtt col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <label for="link">Twitter</label>
                                <input type="text" class="form-control" id="input_twitter" name="twitter"
                                    placeholder="@user" value="{{ $profile->twitter }}">
                            </div>
                            <div class="form-group inputtt col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <label for="link">Tiktok</label>
                                <input type="text" class="form-control" id="input_tiktok" name="tiktok"
                                    placeholder="@user" value="{{ $profile->tiktok }}">
                            </div>
                        </div>
                        {{-- <div class="form-row socialss fst_row">
                        <div class="form-group inputtt col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <label for="link">Twitter</label>
                            <input type="text" class="form-control" id="input_twitter" name="twitter"
                                placeholder="Enter your username" value="{{ $profile->twitter }}">
                        </div>
                        <div class="form-group inputtt col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <label for="link">Facebook</label>
                            <input type="text" class="form-control" id="input_snap" name="facebook"
                                placeholder="Enter Facebook URL" value="{{ $profile->facebook }}">
                        </div>
                    </div> --}}
                        <hr>
                        <div class="top_space">
                            <h3 class="featured_photoss ">Prospect Info</h3>
                        </div>

                        <div class="form-row">
                            <div class="form-group inputtt col">
                                <label for="height">Height</label>
                                <input type="text" class="form-control" id="input_height" name="height"
                                    placeholder="Ex. 6’ 1”" value="{{ $profile->height }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" id="input_Weight" name="weight"
                                    placeholder="Ex. 170 lbs" value="{{ $profile->weight }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="gpa">Current GPA</label>
                                <input type="text" class="form-control" id="input_GPA" name="current_gpa"
                                    placeholder="Ex. 4.0" value="{{ $profile->current_gpa }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group inputtt col">
                                <label for="length">Arm Length</label>
                                <input type="text" class="form-control" id="input_length" name="arm_length"
                                    placeholder="Ex. 99" value="{{ $profile->arm_length }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="size">Hand Size</label>
                                <input type="text" class="form-control" id="input_size" name="hand_size"
                                    placeholder="Ex. 9 3/8" value="{{ $profile->hand_size }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="wing">Wing Span</label>
                                <input type="text" class="form-control" id="input_wing" name="wing_span"
                                    placeholder="Ex. 74 1/2" value="{{ $profile->wing_span }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="free-size">Feet Size</label>
                                <input type="text" class="form-control" id="input_free-size" name="feet_size"
                                    placeholder="Ex. 11" value="{{ $profile->feet_size }}">
                            </div>
                        </div>

                        <hr>

                        <div class="top_space">
                            <h3 class="featured_photoss ">Contact</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group inputtt col">
                                <label for="email">QB Recruit’s E-mail</label>
                                <input type="email" class="form-control" id="input_email" name="qb_email"
                                    value="{{ $profile->qb_email }}" required>
                            </div>
                            <div class="form-group inputtt col">
                                <label for="number">Your Phone Number</label>
                                <input type="text" class="form-control" id="phone-number" name="phone"
                                    placeholder="Ex. 123-456-7890" maxlength="10" value="{{ $profile->phone }}">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group inputtt col">
                                <label for="area">City</label>
                                <input type="text" class="form-control" id="inputcity" name="city"
                                    placeholder="Ex. San Diego" value="{{ $profile->city }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="state">State</label>
                                {{-- <input type="text" class="form-control" id="state" name="state"
                                placeholder="Ex. CA" value="{{ $profile->state }}"> --}}
                                <!-- Select with States of the United States -->
                                <select class="form-select selection" aria-label="select" id="state" name="state">
                                    <option value="" @if (!$profile->state) selected @endif>Select a
                                        State</option>
                                    <option value="AL" @if ($profile->state == 'AL') selected @endif>AL</option>
                                    <option value="AK" @if ($profile->state == 'AK') selected @endif>AK</option>
                                    <option value="AZ" @if ($profile->state == 'AZ') selected @endif>AZ</option>
                                    <option value="AR" @if ($profile->state == 'AR') selected @endif>AR</option>
                                    <option value="CA" @if ($profile->state == 'CA') selected @endif>CA</option>
                                    <option value="CO" @if ($profile->state == 'CO') selected @endif>CO</option>
                                    <option value="CT" @if ($profile->state == 'CT') selected @endif>CT</option>
                                    <option value="DE" @if ($profile->state == 'DE') selected @endif>DE</option>
                                    <option value="DC" @if ($profile->state == 'DC') selected @endif>DC</option>
                                    <option value="FL" @if ($profile->state == 'FL') selected @endif>FL</option>
                                    <option value="GA" @if ($profile->state == 'GA') selected @endif>GA</option>
                                    <option value="HI" @if ($profile->state == 'HI') selected @endif>HI</option>
                                    <option value="ID" @if ($profile->state == 'ID') selected @endif>ID</option>
                                    <option value="IL" @if ($profile->state == 'IL') selected @endif>IL</option>
                                    <option value="IN" @if ($profile->state == 'IN') selected @endif>IN</option>
                                    <option value="IA" @if ($profile->state == 'IA') selected @endif>IA</option>
                                    <option value="KS" @if ($profile->state == 'KS') selected @endif>KS</option>
                                    <option value="KY" @if ($profile->state == 'KY') selected @endif>KY</option>
                                    <option value="LA" @if ($profile->state == 'LA') selected @endif>LA</option>
                                    <option value="ME" @if ($profile->state == 'ME') selected @endif>ME</option>
                                    <option value="MD" @if ($profile->state == 'MD') selected @endif>MD</option>
                                    <option value="MA" @if ($profile->state == 'MA') selected @endif>MA</option>
                                    <option value="MI" @if ($profile->state == 'MI') selected @endif>MI</option>
                                    <option value="MN" @if ($profile->state == 'MN') selected @endif>MN</option>
                                    <option value="MS" @if ($profile->state == 'MS') selected @endif>MS</option>
                                    <option value="MO" @if ($profile->state == 'MO') selected @endif>MO</option>
                                    <option value="MT" @if ($profile->state == 'MT') selected @endif>MT</option>
                                    <option value="NE" @if ($profile->state == 'NE') selected @endif>NE</option>
                                    <option value="NV" @if ($profile->state == 'NV') selected @endif>NV</option>
                                    <option value="NH" @if ($profile->state == 'NH') selected @endif>NH</option>
                                    <option value="NJ" @if ($profile->state == 'NJ') selected @endif>NJ</option>
                                    <option value="NM" @if ($profile->state == 'NM') selected @endif>NM</option>
                                    <option value="NY" @if ($profile->state == 'NY') selected @endif>NY</option>
                                    <option value="NC" @if ($profile->state == 'NC') selected @endif>NC</option>
                                    <option value="ND" @if ($profile->state == 'ND') selected @endif>ND</option>
                                    <option value="OH" @if ($profile->state == 'OH') selected @endif>OH</option>
                                    <option value="OK" @if ($profile->state == 'OK') selected @endif>OK</option>
                                    <option value="OR" @if ($profile->state == 'OR') selected @endif>OR</option>
                                    <option value="PA" @if ($profile->state == 'PA') selected @endif>PA</option>
                                    <option value="RI" @if ($profile->state == 'RI') selected @endif>RI</option>
                                    <option value="SC" @if ($profile->state == 'SC') selected @endif>SC</option>
                                    <option value="SD" @if ($profile->state == 'SD') selected @endif>SD</option>
                                    <option value="TN" @if ($profile->state == 'TN') selected @endif>TN</option>
                                    <option value="TX" @if ($profile->state == 'TX') selected @endif>TX</option>
                                    <option value="UT" @if ($profile->state == 'UT') selected @endif>UT</option>
                                    <option value="VT" @if ($profile->state == 'VT') selected @endif>VT</option>
                                    <option value="VA" @if ($profile->state == 'VA') selected @endif>VA</option>
                                    <option value="WA" @if ($profile->state == 'WA') selected @endif>WA</option>
                                    <option value="WV" @if ($profile->state == 'WV') selected @endif>WV</option>
                                    <option value="WI" @if ($profile->state == 'WI') selected @endif>WI</option>
                                    <option value="WY" @if ($profile->state == 'WY') selected @endif>WY</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group inputtt col">
                                <label for="country">Choose If you reside, OUTSIDE of the United States.:</label>
                                {{-- <input type="text" class="form-control" id="country" name="country" placeholder="Ex. Mexico" value="{{ $profile->country }}"> --}}
                                <!-- Select with country options -->
                                <select class="form-select selection" aria-label="select" id="country" name="country">
                                    @if (!$profile->country)
                                        <option value="" selected>Select a Country</option>
                                    @endif

                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}"
                                            @if ($profile->country == $country) selected @endif>{{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Father Information -->
                        <div class="form-row">
                            <div class="form-group inputtt col">
                                <label for="parent_name">Parent Name</label>
                                <input type="text" class="form-control" id="parent_name" name="parent_name"
                                    placeholder="Parent Name" value="{{ $profile->parent_name }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="parent_email">Parent Email</label>
                                <input type="email" class="form-control" id="parent_email" name="parent_email"
                                    placeholder="Parent Email" value="{{ $profile->parent_email }}">
                            </div>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center;" id="parent_validate_email">
                            <strong>EMAIL CANNOT BE THE SAME AS QB E-MAIL</strong>
                        </div>
                        <!-- End Father Information -->

                        <hr>

                        <div class="top_space">
                            <h3 class="featured_photoss ">Coach Information</h3>
                        </div>
                        <div class="form-row fst_row">
                            <div class="form-group inputtt col">
                                <label for="inputcoach_name">QB Coach’s Name</label>
                                <input type="text" class="form-control" id="inputcoach_name" name="qb_coachs_name"
                                    placeholder="Ex. Coach’s Name" value="{{ $profile->qb_coachs_name }}">
                            </div>
                            <div class="form-group inputtt col">
                                <label for="number">QB Coach’s Mobile</label>
                                <input type="text" class="form-control" id="inputcoac_number" name="qb_coachs_mobile"
                                    placeholder="Ex. 123-456-7890" maxlength="10" value="{{ $profile->qb_coachs_mobile }}">
                            </div>
                            <div class="form-group inputtt col-xl-6 col-lg-6 col-md-4 col-sm-12 col-xs-12">
                                <label for="video">QB Coach’s E-mail</label>
                                <input type="email" class="form-control last_in" id="input_link"
                                    name="qb_coachs_email" placeholder="Ex. Coach@Email.com"
                                    value="{{ $profile->qb_coachs_email }}">
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
                            <!--input hidden -->
                            <input type="hidden" name="copy_slug" id="copy_slug"
                                value="{{ url('profile/' . $profile->slug) }}">
                            <div class="academic_btn">
                                <button class="appointment-btn scrollto" style="border: none;">SAVE</button>
                                <a class="appointment-btn scrollto" style="margin-top: 30px;"
                                    href="{{ url('profile/' . $profile->slug) }}" target="_blank">VIEW PROFILE</a>
                                <a class="appointment-btn scrollto" style="margin-top: 30px;" id="copy_profile_link"
                                    onclick="copySlug('{{ url('profile/' . $profile->slug) }}')">COPY PROFILE LINK</a>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        </div>
    </section>

    <!-- ===== End Blog --->
@endsection

@section('css')
    <style>
        .profile_css {
            /* height: 380px;
                                                                                    width: 300px; */
            height: 356px;
        }

        .profile_css img {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header_css {
            /* height: 380px;
                                                                                    width: 700px; */
            height: 356px;
        }

        .header_css img {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-check .form-check-input {
            background-color: #2DC810;
        }

        .radio_btn {
            padding-top: 10px;
        }

        #upgrade_btn {
            font-size: 14px;
            padding: 5px 15px;
            margin-left: 100px;
        }

        #i_am_options {
            margin-bottom: 20px;
            margin-top: -20px;
        }

        @media (max-width: 767px) {
            .form-check {
                padding: 21px 0px 17px 47px !important;
                display: inline-block;
            }

            .appointment-btn {
                width: 100%;
            }
        }

        .academic_btn {
            justify-content: center;
            align-items: center;
        }

        .form-row {
            margin-bottom: 20px;
        }


        .about_profiless {
            margin-top: 0px !important;
        }

        #parent_validate_email {
            display: none;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@stop

@section('js')
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
        const phone_number = document.getElementById('phone-number');
        phone_number.addEventListener('keyup', function(e) {
            var numero = this.value.replace(/\D/g, '');
            var numero2 = numero.substr(0, 3);
            var numero3 = numero.substr(3, 3);
            var numero4 = numero.substr(6, 4);
            this.value = numero2 + '-' + numero3 + '-' + numero4;
            if (this.value.length < 12) {
                this.value = this.value.replace(/\D/g, '');
            }
        });

        const coach_mobile = document.getElementById('inputcoac_number');
        coach_mobile.addEventListener('keyup', function(e) {
            var numero = this.value.replace(/\D/g, '');
            var numero2 = numero.substr(0, 3);
            var numero3 = numero.substr(3, 3);
            var numero4 = numero.substr(6, 4);
            this.value = numero2 + '-' + numero3 + '-' + numero4;

            if (this.value.length < 12) {
                this.value = this.value.replace(/\D/g, '');
            }
        });
    </script>

    <script>
        const instagram_input = document.querySelector("#input_insta")
        const tiktok_input = document.querySelector("#input_tiktok")
        const twitter_input = document.querySelector("#input_twitter")

        instagram_input.addEventListener('keyup', function(e) {
            if (this.value.startsWith('@')) {
                this.value = this.value.substring(1);
            }

            if (this.value.includes('instagram') || this.value.includes('Instagram')) {
                this.value = this.value.substring(this.value.lastIndexOf('/') + 1);
            }
        });


        tiktok_input.addEventListener('keyup', function(e) {
            if (this.value.startsWith('@')) {
                this.value = this.value.substring(1);
            }

            if (this.value.includes('tiktok') || this.value.includes('TikTok')) {
                this.value = this.value.substring(this.value.lastIndexOf('/') + 1);
            }
        });

        twitter_input.addEventListener('keyup', function(e) {
            if (this.value.startsWith('@')) {
                this.value = this.value.substring(1);
            }

            if (this.value.includes('twitter') || this.value.includes('Twitter')) {
                this.value = this.value.substring(this.value.lastIndexOf('/') + 1);
            }
        });

        instagram_input.addEventListener('paste', function(e) {
            e.preventDefault();
        });

        tiktok_input.addEventListener('paste', function(e) {
            e.preventDefault();
        });

        twitter_input.addEventListener('paste', function(e) {
            e.preventDefault();
        });

        const qb_email = document.querySelector("#input_email");
        const parent_email = document.querySelector("#parent_email");
        const parent_validate_email = document.querySelector("#parent_validate_email"); 

        parent_email.addEventListener('keyup', function(e) {
            if (qb_email.value == this.value) {
                this.value = '';
                parent_validate_email.style.display = 'block';
                setTimeout(function() {
                    parent_validate_email.style.display = 'none';
                }, 3000);
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@stop
