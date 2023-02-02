@extends('layouts.frontend')
@section('title', 'WRMag - Profiles')
@section('content')
    <!-- ===== QUARTERBACK PROFILES --->

    <section id="section_red" class="section_red_bg1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>QUARTERBACK PROFILES</h3>
                </div>
            </div>
            <form action="{{ url('search-profiles') }}" method="GET">
                <div class="row profiles">
                    <h6 class="filter_pro">Filter By:</h6>
                    <div class="col-xl-2 col-xs-6 pro">
                        <select class="form-control profile-search-input profiles-select" name="recruiting_class_of"
                            id="recruiting_class_of">
                            <option value="" selected>Class</option>
                            @foreach ($classes as $class)
                                @if ($class['recruiting_class_of'] != null)
                                    <option value="{{ $class['recruiting_class_of'] }}">{{ $class['recruiting_class_of'] }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-2 col-xs-6 pro">
                        <select class="form-control profile-search-input profiles-select" name="position" id="position">
                            <option value="" selected>Position</option>
                            @foreach ($positions as $position)
                                @if ($position['position'] != null)
                                    <option value="{{ $position['position'] }}">{{ $position['position'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-2 col-xs-6 pro">
                        <select class="form-control profile-search-input profiles-select" name="state" id="state">
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
                        <input type="text" class="form-control profile-search-input profiles-text"
                            name="quarterback_search" id="quarterback_search" placeholder="Quarterback Search">
                    </div>
                    <div class="col-xl-2 col-xs-12 pro">
                        <button class="bttnn" id="search_class_position_state_qb">GO</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="form-group">
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
            </div>
            <div class="row different_profiles" style="align-content: center" id="profiles_desktop">
                @foreach ($profiles as $profile)
                    <div class="col-xl-3 col-lg-4 col-xs-12 mb-4 card-content" data-id="{{ $profile->id }}">
                        <div class="featured-qb" onclick="window.location.href='{{ url('/profile/' . $profile->slug) }}'">
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
                                    <img src="{{ asset('template/assets/img/user_p.png') }}" style="visibility: hidden">
                                @endif
                            </a>
                            <span class="qbhl-tag pro-style">{{ $profile->position }}</span>
                        </div>
                        <div class="featured-details">
                            <div class="featured-info">
                                <p class="featured-name"><a href="{{ url('/profile/' . $profile->slug) }}">
                                        {{ $profile->f_name . ' ' . $profile->l_name }}</a></p>
                                <p class="featured-date">Class of {{ $profile->recruiting_class_of }}</p>
                                @if ($profile->academic)
                                    <p class="featured-university">{{ $profile->academic->school_name }}</p>
                                @endif
                                <?php
                                $city = $profile->city ? $profile->city : '';
                                $state = $profile->state ? $profile->state : '';
                                if ($city != '' && $state != '') {
                                    $city_state = $city . ', ' . $state;
                                } elseif ($city != '' && $state == '') {
                                    $city_state = $city;
                                } elseif ($city == '' && $state != '') {
                                    $city_state = $state;
                                } else {
                                    $city_state = '';
                                }
                                ?>
                                <p class="featured-extra">{{ $city_state }}</p>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>

        <div class="row mb-4">
            <div class="col-xl-12">
                {!! $links !!}

            </div>
        </div>

        </div>
    </section>
    <!-- ===== end QUARTERBACK PROFILES --->

    <!-- ===== market your recruitment?--->

    <section id="section_seven" class="section_seven_bg">
        <div class="">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 ">
                    <img src="{{ asset('template/assets/img/2player.png') }}" alt="">
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12  middle_con">
                    <h4> WANT TO</h4>
                    <h1>market your <br><span class="colr" style="font-family: 'Work Sans';">recruitment?</span></h1>
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

@endsection

@section('css')
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

            div.flex.justify-between.flex-1.sm\:hidden>span {
                margin-left: 0px !important;
            }

            #top_100_qb {
                width: 100%;
                margin: 0px;
                text-align: center;
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

        .featured-university {
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0px;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        /* Profiles in a div with scrollbar */
        .scrollbar {
            margin-bottom: 30px;
            margin-top: 30px;
            overflow-y: scroll;
            height: 400px;
            /* border: 1px solid #000; */
        }

        .scrollbar::-webkit-scrollbar {
            width: 10px;
        }

        .scrollbar-primary {
            background-color: #fff;
            /* border: 1px solid #000; */
            margin-bottom: 30px;
            margin-top: 30px;
            overflow-y: scroll;
            height: 500px;
            display: flex;
            flex-direction: row;
        }

        .scrollbar-primary::-webkit-scrollbar {
            width: 10px;
        }

        .force-overflow {
            min-height: 450px;
        }

        /* Todos los elemntos de force-overflow debem estar em una linea horizontal */
        .force-overflow {
            display: flex;
            flex-direction: row;
        }

        #profiles_desktop>div.row>div>nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #section_red>div>div:nth-child(5)>div {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        /* Custom style for the pagination laravel */
        nav>div.flex.justify-between.flex-1.sm\:hidden>a,
        nav>div.flex.justify-between.flex-1.sm\:hidden>span {
            margin-left: 25px;
            background: linear-gradient(180deg, red 0%, #9a0d0d 99.99%, rgba(255, 0, 0, 0) 100%, #ae1010 100%);
            color: #fff;
            padding: 8px 25px;
            white-space: nowrap;
            transition: .3s;
            font-size: 23px;
            line-height: 28px;
            display: inline-block;
            min-width: 150px;
            text-align: center;
        }

        #section_red>div>div.row.mt-4>div>h3 {
            margin-top: 50px !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('template/assets/css/arrows.css') }}">

@stop

@section('js')

    <script>
        const check_it_out = document.getElementById('check_it_out');
        check_it_out.addEventListener('click', function() {
            window.location.href = "{{ url('sign-up') }}";
        });
        const search_class_position_state_qb = document.getElementById('search_class_position_state_qb');
        const quarterback_search = document.getElementById('quarterback_search');
        const city = document.getElementById('city');
        const position = document.getElementById('position');
        const recruiting_class_of = document.getElementById('recruiting_class_of');
        /* search_class_position_state_qb.addEventListener('click', function () {
            const search_value = quarterback_search.value;
            const city_value = city.value;
            const position_value = position.value;
            const recruiting_class_of_value = recruiting_class_of.value;
            // alert(search_value + ' ' + city_value + ' ' + position_value + ' ' + recruiting_class_of_value);
            //Si todos están vacios evitar el submit
            if (search_value == '' && city_value == '' && position_value == '' && recruiting_class_of_value == '') {
                return false;
            }
            
        }); */
        const cards = document.getElementsByClassName('card-content');
        //Recorremos todos los elementos
        for (let i = 0; i < cards.length; i++) {
            //Evento click sobre cada uno de ellos
            cards[i].addEventListener('click', function() {
                //Obtenemos el atributo data-id
                const id = this.getAttribute('data-id');
                // Obtener el div con la clase bg_black del elemento actual
                const bg_black = this.getElementsByClassName('bg_black')[0];
                //Si hacemos click fuera del div bg_black
                if (bg_black.contains(event.target)) {
                    console.log('Click en el div bg_black');
                } else {
                    //Redireccionamos a la url con el id
                    window.location.href = "{{ url('profile') }}" + '/' + id;
                }
            });
        }
    </script>

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

@stop
