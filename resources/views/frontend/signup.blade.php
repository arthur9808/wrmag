@extends('layouts.frontend')
@section('title', 'WRMag - Sign Up')
@section('content')
    <section id="sign-up" class="sign_up">
        <div class="row signnn">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 right_sec">
                <div class="right_sec_con">
                    <div class="title_form loginn">
                        <div class="login_titlle">
                            <a href="{{ url('sign-in') }}" style="text-decoration: none">
                                <h4>LOGIN</h4>
                            </a>
                        </div>
                        <div class="sign_title">
                            <h4>SIGN UP</h4>
                        </div>
                    </div>
                    <div class="form_signup">
                        <form autocomplete="off" action="{{ url('/sign-up') }}" method="POST">
                            @csrf
                            <x-honeypot />
                            <div class="row standard mt-4">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="first-name" class="form-control" id="inputname" name="f_name"
                                            placeholder="QB First Name *"
                                            style="font-family:Arial, FontAwesome" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="last-name" class="form-control" id="inputname" name="l_name"
                                            placeholder="QB Last Name *" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="inputemail" name="email"
                                            placeholder="Email *" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputusername" name="username"
                                            placeholder="Username *" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control profile_icon" id="parent_name" name="parent_name"
                                            placeholder="Parent Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control email_icon" id="parent_email" name="parent_email"
                                            placeholder="Parent Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row standard" id="parent_validate_email">
                                <div class="alert alert-danger alert-dismissible fade show" style="text-align:center;" role="alert">
                                    <strong>EMAIL CANNOT BE THE SAME AS QB E-MAIL</strong>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="password-input">
                                            <input type="password" autocomplete="new-password"
                                                class="form-control flex-input" id="inputpassword" name="password"
                                                placeholder="Password *" required>
                                            <a class="btn btn-primary flex-icon"
                                                style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                                id="show_password">
                                                <i class="fas fa-eye" id="icon-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="password-input">
                                            <input type="password" autocomplete="new-password"
                                                class="form-control flex-input" id="inputpassword2" name="inputpassword2"
                                                placeholder="Confirm Password *" required>
                                            <a class="btn btn-primary flex-icon"
                                                style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                                id="show_password2">
                                                <i class="fas fa-eye" id="icon-eye2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row standard">
                                <div class="col-6">
                                    <p>• 8 or more characters<br>
                                        • One number</p>
                                </div>
                                <div class="col-6">
                                    <p>• One uppercase character<br>
                                        • One special character <br>
                                        <span class="special_character"> (Ex. !@#$%^&*.)</span>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check check_box">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to all statments include in <a href="{{ url('privacy-policy') }}"><span
                                                class="red-colr">Terms of Use</span></a>
                                    </label>
                                </div>
                            </div>
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
                            <button type="submit" class="btn btn-primary" id="pay-button">Sign up</button>
                            <!-- Loader -->
                            <div class="col-xs-12" id="loader-content">
                                <div class="pay_loader">
                                    <div class="lds-dual-ring"></div>
                                </div>
                            </div>
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
        .radio_btn {
            display: flex;
            padding-top: 53px;
            justify-content: center;
            text-align: center;
            /* align-content: space-between; */
        }
        .radio_btn>div {
            margin: 0px 10px;
        }
        /* Cambios Annel */
        @media only screen and (max-width: 600px) {
            .sign_title::before {
                margin-left: -90px !important;
            }
            .signnn {
                display: flex;
                flex-direction: column-reverse;
            }
            .sign_title::after {
                left: 70% !important;
            }
            .right_sec_con {
                padding-top: 70px;
            }
            .right_sec_con {
                padding: 100px 0px !important;
            }
        }
        /* Media query max 768px */
        @media only screen and (max-width: 768px) {
            .form-control::-webkit-input-placeholder {
                font-size: 15px;
            }
        }
        /* Pantalla mayor a 990 px y menor  1360 px */
        @media only screen and (min-width: 990px) and (max-width: 1360px) {
            .sign_title::before {
                margin-left: -90px !important;
            }
            .login_titlle::after {
                right: 35% !important;
            }
        }
        /* Pantalla mayor a 1360 ppx y menor a 1920 px */
        @media only screen and (min-width: 1360px) and (max-width: 1910px) {
            .sign_title::before {
                margin-left: -140px !important;
            }
            .login_titlle::after {
                right: 57.5% !important;
            }
            .sign_title::after {
                left: 58.5% !important;
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
            right: 59.5%;
        }
        .sign_title::after {
            left: 59.5%;
        }
        .sign_title::before {
            margin-left: -200px;
        }
        .loginn {
            margin-bottom: 0px;
        }
        .login_titlle::after {
            background-color: #7c7c7c;
        }
        .login_titlle h4 {
            color: #7c7c7c;
        }
        #sign-up {
            margin-top: 60px !important;
        }
        .right_sec {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .right_sec_con {
            width: 50%;
            padding-top: 200px;
            padding-left: 80px;
            padding-right: 80px;
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

        #sign-up > div > div > div > div.form_signup {
            padding: 0px 100px;
        }

        #parent_validate_email {
            display: none;
        }
    </style>
    <link href="{{ asset('template/assets/css/responsive-login.css') }}" rel="stylesheet">
@stop

@section('js')
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        const togglePassword = document.querySelector('#show_password');
        const password = document.querySelector('#inputpassword');
        const icon = document.querySelector('#icon-eye');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            icon.classList.toggle('fa-eye-slash');
        });
        //Show confirm password
        const togglePassword2 = document.querySelector('#show_password2');
        const password2 = document.querySelector('#inputpassword2');
        const icon2 = document.querySelector('#icon-eye2');
        togglePassword2.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            // toggle the eye slash icon
            icon2.classList.toggle('fa-eye-slash');
        });
    </script>
    <script>
        let valid_password = false;
        let double_validate = false;
        const messages = document.querySelector('#messages');
        function validatePassword(password) {
            var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;
            return re.test(password);
        }
        $('#inputpassword').on('keyup', function() {
            var password = $(this).val();
            if (validatePassword(password)) {
                $(this).css('border', '1px solid green');
                valid_password = true;
            } else {
                $(this).css('border', '1px solid red');
                valid_password = false;
            }
        });
        //Confirm double password
        $('#inputpassword2').on('keyup', function() {
            var password = $('#inputpassword').val();
            var password_confirmation = $(this).val();
            if (validatePassword(password_confirmation)) {
                if (password == password_confirmation) {
                    $(this).css('border', '1px solid green');
                    double_validate = true;
                    messages.innerHTML = '';
                } else {
                    $(this).css('border', '1px solid red');
                    double_validate = false;
                    messages.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\
                            <strong>Passwords do not match.</strong>\
                            </div>';
                }
            } else {
                $(this).css('border', '1px solid red');
                double_validate = false;
            }
        });
        $('form').submit(function(e) {
            if (valid_password) {
                // console.log('valid');
                $('#pay-button').hide();
                $('#loader-content').show();
            } else {
                e.preventDefault();
                messages.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\
                        <strong>Password must contain at least 8 characters, one uppercase, one lowercase, one number and one special character.</strong>\
                        </div>';
            }
        });

        const qb_email = document.querySelector("#inputemail");
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
@stop