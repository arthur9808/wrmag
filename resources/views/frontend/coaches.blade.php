@extends('layouts.frontend')
@section('title', 'WRMag - Coaches')
@section('content')
<!-- ===== Coaches --->
<section id="section_coaches" class="coaches">
    <div class="container">
        <div class="quarterback_coaches">
            <h3>Private Quarterback Coaches</h3>
            <div class="academic_btn_mail">
                <a class="bttnn" href="mailto:catch@wrmag.com" id="btn_contact" class="appointment-btn scrollto">CONTACT US</a>
            </div>
            <form action="{{ url('search-coach') }}" method="GET">
                <span class="filter_filter">Filter by:</span>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 select_box">
                        <select class="profile-search-input form-select" aria-label="Default select example" name="search">
                            <option selected>Select a State</option>
                            @foreach($states as $state)
                            @if($state['state'] != null)
                            <option value="{{ $state->state }}">{{ $state->state }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 p_title">
                        {{-- <p>Private Quarterback Coach</p> --}}
                        <button class="go_btn">GO <img src="{{ asset('template/assets/img/search.png') }}"
                            class="search_img"></button>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                        <button class="go_btn">GO <img src="{{ asset('template/assets/img/search.png') }}"
                            class="search_img"></button>
                    </div> --}}
                </div>
            </form>
            <div class="row full_coaches">
                @foreach($coaches as $coach)
                <!-- This  div will have de coach photo as background -->
                <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 coaches_img" data-id="{{ $coach->id }}" 
                style = "background-image: url('{{ asset('storage/'.$coach->image) }}')">
                    <div class="giovando">
                        <a style="text-decoration: none" href="{{ url('coach/'.$coach->id) . '/' }}"><h3>{{ $coach->f_name .' ' . $coach->l_name }}</h3></a>
                        <?php 
                            $title = $coach->title ? $coach->title : '-';
                            $city = $coach->city ? $coach->city : '-';
                            $state = $coach->state ? $coach->state : '-';
                        ?>
                        <h6> {{ $title }}<h6>
                        <p>{{ $city  }}, {{ $state }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="coaches_full_width">
        <div class="bottom_coaches">
            <h3>PRIVATE QB COACHES </h3>
            <h6>
                CONNECT WITH US TO HAVE YOUR <br>ACADEMY ADDED TO OUR PLATFORM
            </h6>
                    <div class="academic_btn">
                        <a class="bttnn" href="mailto:catch@wrmag.com" id="btn_contact" class="appointment-btn scrollto">CONTACT US</a>
                    </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<style>

    .go_btn {
        border: none !important;
    }
    
    @media only screen and (max-width: 600px) {
        /* *{
            overflow-x: hidden;
        } */

        #section_coaches > div.container > div > form > div > div.col-xl-2.col-lg-2.col-md-3.col-sm-12.col-xs-12 {
            margin-left: -40px;
        }

        
    }

    #section_coaches > div.container > div > form > div > div.col-2 > button {
        border: none;
    }

    .coaches_img:hover {
        cursor: pointer;
    }

    

    @media (max-width: 767px) {
        .quarterback_coaches h3 {
            text-align: center;
            font-size: 40px;
        }

        #section_coaches > div.container > div > form {
            margin: 20px auto;
        }

        .bottom_coaches h3 {
            font-size: 35px;
        }

        .bottom_coaches h6 {
            font-size: 30px;
        }

        .title_btn > a {
            font-size: 16px !important;
        }

        .title_btn {
            display: flex;
            gap: 50px;
            justify-content: center !important;
            align-items: center !important;
        }

        #btn_contact {
            font-size: 14px !important;
        }

        .go_btn {
            margin-top: 20px;
            margin-left: 0px !important
        }

    }

    .go_btn {
        margin-top: 5px;
        height: 45px;
    }

    .bottom_coaches h3 {
        font-weight: 900;
        line-height: 47px;
    }

    .bottom_coaches h6 {
        font-weight: 900;
        color: #000;
        line-height: 47px;
    }

    #btn_contact {
        font-weight: 400 !important;
    }

    .title_btn {
        display: flex;
        gap: 50px;
        justify-content: start;
        align-items: start;
        margin-bottom: 20px;
    }

    .quarterback_coaches > h3 {
        text-transform: uppercase;
    }

    #btn_contact_coach > h5 {
        font-family: "RaleWay", sans-serif;
        font-size: 20px;
        font-weight: 400;
        line-height: 28px;
        background: linear-gradient( 180deg, #2DC810 0%, #9a0d0d 99.99%, rgba(255, 0, 0, 0) 100%, #ae1010 100% );
        color: #fff !important;
        transition: 0.3s;
        /* padding: 5px; */
        padding: 10px 25px;
        width: 60%;
        text-align: center;
    }

    .academic_btn_mail {
        display: flex;
        justify-content: start;
        align-items: flex-start;
        margin-bottom: 20px;
    }
</style>
@stop

@section('js')
<script>
    //Toda la tarjeta de un coach al dar click debe redirigir a la pagina del coach
    const card_coach = document.querySelectorAll('.coaches_img');
    card_coach.forEach(card => {
        card.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            window.location.href = "{{ url('coach') }}/" + id;
        });
    });

    /* const btn_contact = document.querySelector("#btn_contact");
    btn_contact.addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = "{{ url('contactus') }}";
    }); */

    
</script>

@stop