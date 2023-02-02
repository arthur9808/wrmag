@extends('layouts.frontend')
@section('title', 'WRMag - Academic Profile')
@section('content')
    <section id="academic_section" class="about_academics">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 left_proiless">
                    <div class="img_box" onclick="window.location.href='{{ url('profile-about/' . $profile->slug) }}'">
                        <a href="{{ url('profile-about/' . $profile->slug) }}"> <img
                                src="{{ asset('template/assets/img/player 3.png') }}" alt=""></a>
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
                    <div class="img_box_last"
                        onclick="window.location.href='{{ url('profile-academic/' . $profile->slug) }}'">
                        <a href="{{ url('profile-academic/' . $profile->slug) }}"><img
                                src="{{ asset('template/assets/img/Vector (6).png') }}" alt=""></a>
                        <p>
                            Academic
                            {{-- @if ($section_locked) 
                        <!-- UPGRADE BADGE -->
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
                <div class="col-xl-10 col-lg-10 col-md-8 col-sm-12 col-xs-12 about_right">
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
                                    {{-- @if ($membership->name != 'ALL-PRO')
									<a id="upgrade_btn" href="{{ url('/memberships') }}"  class="appointment-btn scrollto">UPGRADE</a>
                                @endif --}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <form action="{{ url('/profile-academic') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Input hidden for profile id -->
                        <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                        <div class="top_inputs">
                            <div class="row" id="help_message">
                                <h4 class="featured_photos">Please e-mail <a class="issues_mail"
                                        href="catch@wrmag.com">catch@wrmag.com</a> for any
                                    issues</h3>
                            </div>
                            <div class="top_space">
                                <h3 class="featured_photos">Academic Stats</h3>
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
                            <div class="form-row fst_row">
                                <div class="form-group inputtt ">
                                    <label for="class">Graduation Class Year</label>
                                    <input type="text" class="form-control" id="input_class_year" placeholder="Ex. 2021"
                                        name="graduation_class_year" value="{{ $academic->graduation_class_year }}">
                                </div>
                                <div class="form-group inputtt col-xl-4 col-lg-4 col-md-4">
                                    <label for="schoolname">Name of School</label>
                                    <input type="text" class="form-control" id="input_schoolname"
                                        placeholder="Ex. Virginia Tech" name="school_name"
                                        value="{{ $academic->school_name }}">
                                </div>
                                <div class="form-group inputtt ">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="input_city"
                                        placeholder="Ex. Blacksburg" name="city" value="{{ $academic->city }}">
                                </div>
                                <div class="form-group inputtt ">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="input_state" placeholder="Ex. VA"
                                        name="state" value="{{ $academic->state }}">
                                </div>
                            </div>
                            <div class="form-row fst_row">
                                <div class="form-group inputtt ">
                                    <label for="gpa">Current GPA</label>
                                    <input type="number" step="any" class="form-control" id="input_gpa"
                                        placeholder="Ex. 4.0" name="current_gpa" value="{{ $academic->current_gpa }}">
                                </div>
                                <div class="form-group inputtt ">
                                    <label for="score">SAT Score</label>
                                    <input type="number" class="form-control" id="input_satscore"
                                        placeholder="Ex. 1520" name="sat_score" value="{{ $academic->sat_score }}">
                                </div>
                                <div class="form-group inputtt ">
                                    <label for="score">ACT Score</label>
                                    <input type="number" class="form-control" id="input_actscore" placeholder="Ex. 21"
                                        name="atc_score" value="{{ $academic->atc_score }}">
                                </div>
                                <div class="form-group inputtt ">
                                    <label for="year">Year</label>
                                    <input type="text" class="form-control" id="input_year" placeholder="Ex. 2021"
                                        name="year" value="{{ $academic->year }}">
                                </div>
                                <div class="form-group inputtt col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="awardname">Any Honors or Awards</label>
                                    <input type="text" class="form-control last_in" id="input_awardname"
                                        placeholder="" name="name_of_the_honor_or_award"
                                        value="{{ $academic->name_of_the_honor_or_award }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        $hight_school_stats = [
                            'year' => json_decode($academic->hight_school_stats_year),
                            'games_played' => json_decode($academic->hight_school_stats_games_played),
                            'completions' => json_decode($academic->hight_school_stats_completions),
                            'passing_attempts' => json_decode($academic->hight_school_stats_passing_attempts),
                            'passing_yards' => json_decode($academic->hight_school_stats_passing_yards),
                            'passing_tds' => json_decode($academic->hight_school_stats_passing_tds),
                            'rushing_yards' => json_decode($academic->hight_school_stats_rushing_yards),
                            'rushing_tds' => json_decode($academic->hight_school_stats_rushing_tds),
                        ];
                        ?>
                        <div class="top_space">
                            <h3 class="featured_photoss">School Stats </h3>
                        </div>
                        @for ($i = 0; $i < count($hight_school_stats['year']); $i++)
                            <div id="hight_school_stats">
                                <div class="form-row">
                                    <div class="form-group  inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="year">Year </label>
                                        <input type="text" class="form-control foot_ball" id="input_year"
                                            placeholder="Ex. 2022" name="hight_school_stats_year[]"
                                            value="{{ $hight_school_stats['year'][$i] }}">
                                    </div>
                                    <div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="games_played">Games Played </label>
                                        <input type="text" class="form-control honor" id="games_played"
                                            placeholder="Ex. 13" name="hight_school_stats_games_played[]"
                                            value="{{ $hight_school_stats['games_played'][$i] }}">
                                    </div>
                                    <div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="completions">Completions </label>
                                        <input type="text" class="form-control honor" id="completions"
                                            placeholder="Ex. 17" name="hight_school_stats_completions[]"
                                            value="{{ $hight_school_stats['completions'][$i] }}">
                                    </div>
                                    <div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="passing_attempts">Passing Attempts </label>
                                        <input type="text" class="form-control honor" id="passing_attempts"
                                            placeholder="Ex. 22" name="hight_school_stats_passing_attempts[]"
                                            value="{{ $hight_school_stats['passing_attempts'][$i] }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="passing_yards">Passing Yards </label>
                                        <input type="text" class="form-control foot_ball" id="passing_tds"
                                            placeholder="Ex. 109" name="hight_school_stats_passing_yards[]"
                                            value="{{ $hight_school_stats['passing_yards'][$i] }}">
                                    </div>
                                    <div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="passing_tds">Passing TDs </label>
                                        <input type="text" class="form-control honor" id="passing_tds"
                                            placeholder="Ex. 13" name="hight_school_stats_passing_tds[]"
                                            value="{{ $hight_school_stats['passing_tds'][$i] }}">
                                    </div>
                                    <div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="rushing_yards">Rushing Yards </label>
                                        <input type="text" class="form-control honor" id="rushing_yards"
                                            placeholder="Ex. 17" name="hight_school_stats_rushing_yards[]"
                                            value="{{ $hight_school_stats['rushing_yards'][$i] }}">
                                    </div>
                                    <div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label for="rushing_tds">Rushing TDs </label>
                                        <input type="text" class="form-control honor" id="rushing_tds"
                                            placeholder="Ex. 22" name="hight_school_stats_rushing_tds[]"
                                            value="{{ $hight_school_stats['rushing_tds'][$i] }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group inputtt col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button type="button" class="btn btn-secondary btn-lg btn-block"
                                            style="width:100%" onclick="delete_hight_school_stats(this)">
                                            <i class="fa fa-trash"></i> Delete Row
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div id="add_hight_school_stats" class="add academic_plus" style="cursor: pointer">
                            <i class="fas fa-plus"></i><span class="another_row">Add Another Row</span>
                        </div>

                        <hr>
                        <div class="top_space">
                            <h3 class="featured_photoss career_">Football Career Honors</h3>
                        </div>

                        <?php
                        $football_career_honors = [
                            'year' => json_decode($academic->football_career_honors_year),
                            'honors' => json_decode($academic->football_career_honors),
                        ];
                        ?>
                        @for ($i = 0; $i < count($football_career_honors['year']); $i++)
                            <div id="football_career_honors" class="form-row fst_row">
                                <div class="form-group  inputtt col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="year">Year </label>
                                    <input type="text" class="form-control foot_ball" id="input_year"
                                        placeholder="Ex. 2021" name="football_career_honors_year[]"
                                        value="{{ $football_career_honors['year'][$i] }}">
                                </div>
                                <div class="form-group inputtt col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <label for="career">Football Career Honors </label>
                                    <input type="text" class="form-control honor" id="input_career"
                                        placeholder="Ex. Captain Honor" name="football_career_honors[]"
                                        value="{{ $football_career_honors['honors'][$i] }}">
                                </div>
                                <div class="form-group inputtt col">
                                    <!-- Delete Button -->
                                    <button type="button" class="btn btn-danger btn-sm btn_trash"
                                        onclick="delete_college_offers(this)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endfor

                        <div id="add_football_career_honors" class="add academic_plus" style="cursor: pointer">
                            <i class="fas fa-plus"></i><span class="another_row">Add Another Row</span>
                        </div>
                        <div id="wonderlic_practice_test">
                            <hr>
                            <div class="top_space cover-pic">
                                <h3 class="featured_photoss ">Wonderlic (Practice) Test</h3>

                                <p>Enter to <a href="https://wonderlictestpractice.com/"
                                        style="text-decoration: none; color:#000;"><b>WWW.WONDERLICTESTPRACTICE.COM</b></a>
                                    and complete the test, UPLOAD your screen
                                    shot of your score below:</p>
                                @if ($academic->wonderlic_practice_test)
                                    {{-- <img src="{{ asset('storage/'.$academic->wonderlic_practice_test) }}" alt=""> --}}
                                    <img src="{{ asset('storage/' . $academic->wonderlic_practice_test) }}"
                                        alt="">
                                @else
                                    <img src="{{ asset('template/assets/img/cover-test-profile.jpg') }}" alt="">
                                @endif
                                <input type="file" name="wonderlic_practice_test" accept="image/*">
                                <br><span class="pdfss">(.png, .jpg, .jpge)

                            </div>
                            @if ($academic->wonderlic_practice_test)
                                <div class="row">
                                    <!-- Delete Image Button -->
                                    <button type="button" class="btn btn-danger btn-sm btn_trash"
                                        onclick="delete_wonderlic_practice_test_from_server({{ $academic->id }})">
                                        <i class="fa fa-trash"></i> Remove Test
                                    </button>
                                </div>
                            @endif
                        </div>
                        <br>
                        <!-- Alert for the user if they have not filled out all the fields -->
                        <div class="alert alert-danger" role="alert" id="alert_user">
                            <h1>Please click SAVE to update your LIVE profile</h1>
                            <br><br>
                            <h3>If you do not click save, your changes will not be saved.</h3>
                            <h3>Support issues email <a class="issue_alert" href="catch@wrmag.com">catch@wrmag.com</a></h3>
                        </div>
                        <br>
                        <div class="row mt-4">
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

@endsection

@section('css')
    <style>
        a.btn,
        button.btn {
            border: 2px solid #2DC810;
            background: #2DC810;
        }

        input[type="date"]:not(.has-value):before {
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
        }

        .academic_btn {
            justify-content: center;
            align-items: center;
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
        function delete_college_offers(offer) {
            offer.parentNode.parentNode.remove();
        }

        function delete_hight_school_stats(stats) {
            stats.parentNode.parentNode.parentNode.remove();
        }
    </script>
    <!-- Football Career Honors -->
    <script>
        const add_football_career_honors = document.getElementById('add_football_career_honors');
        const football_career_honors = document.getElementById('football_career_honors');
        add_football_career_honors.addEventListener('click', function() {
            const new_football_career_honors = football_career_honors.cloneNode(true);
            football_career_honors.parentNode.insertBefore(new_football_career_honors, football_career_honors
                .nextSibling);
        });

        const add_hight_school_stats = document.getElementById('add_hight_school_stats');
        const hight_school_stats = document.getElementById('hight_school_stats');
        add_hight_school_stats.addEventListener('click', function() {
            const new_hight_school_stats = hight_school_stats.cloneNode(true);
            const inputs = new_hight_school_stats.getElementsByTagName('input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }
            const hight_school_stats_count = document.querySelectorAll('#hight_school_stats');
            hight_school_stats_count[hight_school_stats_count.length - 1].parentNode.insertBefore(
                new_hight_school_stats, hight_school_stats_count[hight_school_stats_count.length - 1]
                .nextSibling);
        });
    </script>
    <!-- End Football Career Honors -->

    <!-- Wonderlic (Practice) Test -->
    <script>
        const wonderlic_practice_test = '{{ $permissions['wonderlic_practice_test'] }}';
        const wonderlic_practice_test_content = document.getElementById('wonderlic_practice_test');
        // console.log(wonderlic_practice_test_content);
        if (!wonderlic_practice_test) {
            // console.log('You do not have access to this feature');
            /* wonderlic_practice_test_content.style.backgroundColor = '#e6e6e6';
            wonderlic_practice_test_content.style.padding = '15px';
            wonderlic_practice_test_content.style.pointerEvents = 'none';
            wonderlic_practice_test_content.style.marginTop = '30px';
            wonderlic_practice_test_content.style.marginBottom = '30px'; */

            wonderlic_practice_test_content.style.display = 'none';
        }
        // const football_career_honors = document.getElementById('football_career_honors');
    </script>
    <!-- End Wonderlic (Practice) Test -->
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        function delete_wonderlic_practice_test_from_server(id) {
            // console.log(id);
            $.ajax({
                url: '{{ url('/profile-academic-remove-test') }}',
                type: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    if (data.success) {
                        console.log(data.success);
                        location.reload();
                    }
                }
            });
        }
    </script>
@stop
