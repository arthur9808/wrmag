@extends('layouts.frontend')
@section('title', 'WRMag - Login')
@section('content')

<section id="sign-up" class="sign_up">
    <div class="row signnn">
        {{-- <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 left_sec">
            <div class=" left_div">
                <img src="{{ asset('template/assets/img/logo-final-grey 2.png') }}" alt="">
                <h3>Control your Brand</h3>
                <p>We want you to <b>TAKE</b> care of your brand, <b>BETTER</b> your
                    brand, and <b>MAXIMIZE</b> your recruitment opportunities
                    with the Quarterback Magazine’s unlimited potential
                    platforms.</p>

                <div class="row footer_menu">
                    <div class="black-bg">
                        <nav id="navbar" class="navbarr foot order-last order-lg-0">
                            <ul>
                                <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('/memberships') }}">Memberships</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('/profiles') }}">Profiles</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('/contactus') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 right_sec">
            <div class="right_sec_conn">
                <div class="title_form loginn">
                    <div class="login_titlle">
                        <h4>LOGIN</h4>
                    </div>
                    <div class="sign_title">
                        <a href="{{ url('sign-up') }}" style="text-decoration: none"><h4>SIGN UP</h4></a>
                    </div>
                </div>
                <div class="form_signup">
                    <form action="{{ url('/sign-in') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <input type="username" class="form-control" id="inputusername" name="username"
                                placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <div class="password-input">
                                <input type="password" autocomplete="new-password" class="form-control flex-input"
                                    id="inputpassword" name="password" placeholder="Password" required>
                                <a class="btn btn-primary flex-icon"
                                    style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                    id="show_password">
                                    <i class="fas fa-eye" id="icon-eye"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Alert to show messages -->
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
                        <!-- End Alert to show messages -->
                        <button type="submit" class="btn btn-primary">Login</button>
                        <h6 class="forget"><a href="{{ url('reset-password') }}">Forgot your password?</a></h6>
                        <p class="reset"><a href="{{ url('reset-password') }}">Reset Password</a></p>
                        {{-- <p class="reset"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Back to home </a></p> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection

@section('css')
<style>
    .password-input {
        display: flex;
        flex-direction: row;
    }
    .flex-input {
        width: 100%;
    }

    /* Cambios Annel */
    @media only screen and (max-width: 600px) {

        .sign_title::before {
            margin-left: -95px !important;
        }

        .signnn {
            display: flex;
            flex-direction: column-reverse;
        }

        .sign_title::after {
            left: 70% !important;
        }

        .right_sec_conn {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        
    }

    /* Pantalla mayor a 990 px y menor  1360 px */
    @media only screen and (min-width: 990px) and (max-width: 1360px) {

        .sign_title::before {
            margin-left: -90px !important;
        }

        .login_titlle::after {
            right: 45% !important;
        }

        

    }

    @media (max-width: 990px) {
        .login_titlle::after {
            right: 69% !important;
        }
    }

    /* Pantalla mayor a 1360 ppx y menor a 1920 px Macbook*/
    @media only screen and (min-width: 1360px) and (max-width: 1910px) {

        .sign_title::before {
            margin-left: -135px !important;
        }

        .login_titlle::after {
            right: 58% !important;
        }

        

    }

    .login_titlle {
        width: 50%;
        float: none;
        text-align: center;
    }

    .sign_title {
        width: 50%;
        float: none;
        padding-left: 0px;
    }

    .login_titlle::after {
        /* right: 37%; */
        right: 59%;
    }

    .sign_title::after {
        left: 59%;
    }

    .sign_title::before {
        margin-left: -195px;
    }


    #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.right_sec > div > div.title_form.loginn > div.sign_title > a > h4 {
        color: #7c7c7c;
    }

    #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.right_sec > div > div.title_form.loginn > div.login_titlle > a > h4::after {
        color: #2DC810 !important;
    }

    #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.right_sec > div > div.title_form.loginn > div.sign_title > h4 {
        color: #fff;
    }

    #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.right_sec > div > div.title_form.loginn > div.login_titlle > h4 {
        color: #fff;
    }

    .sign_title::after {
        background-color: #7c7c7c;
    }

    .login_titlle::after {
        background: #2DC810;
    }

    #sign-up {
        margin-top: 100px !important;
    }

    .right_sec {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .right_sec_conn {
        width: 50%;
        padding-top: 200px;
        padding-left: 80px;
        padding-right: 80px;
    }

    .login_titlle h4 {
        color: #fff;
    }

    .sign_title h4 {
        color: #7c7c7c;
    }

    a.btn.btn-primary {
        width: 100%;
        background: linear-gradient(180deg, #2DC810 0%, #9A0D0D 99.99%, rgba(255, 0, 0, 0) 100%, #AE1010 100%);
        border: none;
        padding: 14px 25px;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;
    }

    a.btn {
        font-size: 23px;
        padding: 8px 25px;
        border: 2px solid #fff;
        background: #2DC81000;
        color: #fff;
        text-transform: uppercase;
    }
    
</style>
@stop

@section('js')
<script>
    const togglePassword = document.querySelector('#show_password');
    const password = document.querySelector('#inputpassword');
    const icon = document.querySelector('#icon-eye');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        icon.classList.toggle('fa-eye-slash');
    });
</script>
@stop