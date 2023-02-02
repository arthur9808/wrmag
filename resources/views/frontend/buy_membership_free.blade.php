@extends('layouts.login')
@section('title', 'WRMag - Buy Membership')
@section('content')

<section id="sign-up" class="sign_up">
    <div class="row signnn">
        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 left_sec">
            <div class=" left_div">
                <img src="{{ asset('template/assets/img/3QB-Magazine-logo.png') }}" alt="" onclick="window.location.href='{{ url('/') }}'">
                <h3>MARKET YOUR RECRUITMENT</h3>
                <h4>BUILD YOUR FREEE PROFILE</h4>
                <p>The WRMag allows athletes to build their digital recruiting profile in a few simple steps. 
                    Input your personal info, stats, and photos/video to feature on your personal digital profile built for the modern 
                    day quarterback.
                </p>
                <p class="cost_p">This is on us, no cost to you.</p>

                <div class="row footer_menu">
                    <div class="black-bg">
                        {{-- <nav id="navbar" class="navbarr foot order-last order-lg-0">
                            <ul>
                                <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('/memberships') }}">Memberships</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('/profiles') }}">Profiles</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('/contactus') }}">Contact</a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 right_sec">
            <div class="right_sec_con">
                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                <form role="form" action="{{ url('/complete-payment-free') }}" method="post"
                                    class="require-validation" id="payment-form">
                                    @csrf
                                    <div class='row standard'>
                                        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                            <div class='form-group required'>
                                                <input type="hidden" name="membership_id" value="{{ $membership->id }}">
                                                <input class='form-control' id="inputname" name="f_name" type='text'
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                            <div class='form-group required'>
                                                <input class='form-control' id="inputname" name="l_name" type='text'
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row standard'>
                                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                            <div class='form-group required'>
                                                <input class='form-control' id="inputemail" name="email" type='email'
                                                    placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row standard'>
                                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                            <div class='form-group required'>
                                                <input class='form-control' id="inputusername" name="username" type='text'
                                                    placeholder="Username" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row standard'>
                                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                            <div class='form-group required'>
                                                <input class='form-control profile_icon' id="parent_name" name="parent_name" type='text'
                                                    placeholder="Parent Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row standard'>
                                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                            <div class='form-group required'>
                                                <input class='form-control email_icon' id="parent_email" name="parent_email" type='email'
                                                    placeholder="Parent Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row standard'>
                                        <div class='col-xs-12 form-group required'>
                                            <div class="password-input">
                                                <input class='form-control flex-input' autocomplete="new-password"
                                                    name="password" id="inputpassword" type='password'
                                                    placeholder="Password" required>
                                                <a class="btn btn-primary flex-icon"
                                                    style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                                    id="show_password">
                                                    <i class="fas fa-eye" id="icon-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="password-input">
                                            <input type="password" autocomplete="new-password"
                                                class="form-control flex-input" id="inputpassword2" name="inputpassword2"
                                                placeholder="Confirm Password" required>
                                            <a class="btn btn-primary flex-icon"
                                                style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                                id="show_password2">
                                                <i class="fas fa-eye" id="icon-eye2"></i>
                                            </a>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check check_box">
                                            <input class="form-check-input" type="checkbox" id="terms" name="terms"
                                                required>
                                            <label class="form-check-label" for="terms">
                                                I agree to all statments include in <a href="{{ url('privacy-policy') }}"><span class="red-colr">Terms of Use</span></a>
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

                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit" id="pay-button">Pay Now ${{
                                                $membership->price }}</button>
                                        </div>
                                        <!-- Loader -->
                                        <div class="col-xs-12" id="loader-content">
                                            <div class="pay_loader">
                                                <div class="lds-dual-ring"></div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('css')
<style type="text/css">
    
    .left_div > img {
        margin: auto !important;
    }

    .left_sec h4 {
        font-family: 'Work Sans', sans-serif;
        font-style: normal;
        font-weight: 900;
        font-size: 44px;
        line-height: 65px;
        text-align: center;
        text-transform: uppercase;
        color: #000;
    }

    .cost_p {
        margin-top: -55px;
        font-weight: 600 !important;
    }
    .left_div > img:hover {
        cursor: pointer;
    }

    .left_div {
        width: 100%;
        float: none;
        padding: 100px 50px 100px !important;
        display: flex !important;
        flex-direction: column !important; 
    }

    .left_sec p {
        text-align: center;
        padding-right: 0px;
    }

    .left_sec p {
        text-align: center !important;
        /* padding-bottom: 10px; */
        padding: 30px 100px 30px 100px !important;
    }

    .left_sec h3 {
        text-align: center !important;
        margin: 30px;
    }
    
    .right_sec_con {
        padding-top: 80px !important;
        padding-bottom: 50px !important;
    }

    .panel-title {
        display: inline;
        font-weight: bold;
    }

    .radio_btn {
        display: flex;
        padding-top: 53px;
        justify-content: center;
        text-align: center;
        /* align-content: space-between; */
    }

    .display-table {
        display: table;
    }

    .display-tr {
        display: table-row;
    }

    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }

    .password-input {
        display: flex;
        flex-direction: row;
    }

    .flex-input {
        width: 100%;
    }

    .hide {
        /* visibility: hidden; */
        display: none;
    }

    #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.right_sec > div > div > div > div > div {
        margin-top: 50px;
    }

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

        #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.right_sec > div > div > div > div > div {
            margin-top: -50px;
        }
    }

    @media only screen and (max-width: 768px) {
        .special_character {
            margin-left: 20px !important;
        }

        .left_sec p {
            padding: 30px 10px 30px 10px !important;
        }

        .left_sec h3 {
            margin: 0px;
        }
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

<!-- Libraries -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- End Libraries -->

<!-- Password Show Hide -->
<script>
    //Show Password
    const togglePassword = document.querySelector('#show_password');
    const password = document.querySelector('#inputpassword');
    const icon = document.querySelector('#icon-eye');
    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        icon.classList.toggle('fa-eye-slash');
    });

    //Show confirm password
    const togglePassword2 = document.querySelector('#show_password2');
    const password2 = document.querySelector('#inputpassword2');
    const icon2 = document.querySelector('#icon-eye2');
    togglePassword2.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        // toggle the eye slash icon
        icon2.classList.toggle('fa-eye-slash');
    });

    /* Validate Password*/
    let valid_password = false;
    let double_validate = false;
    const messages = document.querySelector('#messages');

    function validatePassword(password) {
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;
        return re.test(password);
    }
    
    $('#inputpassword').on('keyup', function () {
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
    $('#inputpassword2').on('keyup', function () {
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

    $('form').submit(function (e) {
        if(valid_password) {
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
</script>
<!-- End Password Show Hide -->

@stop