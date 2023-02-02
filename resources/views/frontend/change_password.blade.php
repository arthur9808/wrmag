@extends('layouts.login')
@section('title', 'WRMag - Login')
@section('content')

<section id="sign-up" class="sign_up">
    <div class="row signnn">
        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 left_sec">
            <div class=" left_div">
                <img src="{{ asset('template/asses/img/logo-final-grey 2.png') }}" alt="">
                <h3>Control your Brand</h3>
                <p>We want you to <b>TAKE</b> care of your brand, <b>BETTER</b> your
                    brand, and <b>MAXIMIZE</b> your recruitment opportunities
                    with the WRMag’s unlimited potential
                    platforms.</p>

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
            <div class="right_sec_conn">
                <div class="title_form loginn">
                    <div class="login_titlle">
                        <a href="{{ url('sign-in') }}" style="text-decoration: none"><h4>LOGIN</h4></a>
                    </div>
                    <div class="sign_title">
                        <h4>PASSWORD</h4>
                    </div>
                </div>
                <div class="form_signup">
                    <form action="{{ url('/reset-password-profile') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <div class="password-input">
                                <input type="hidden" name="user_token" value="{{ $token }}" required>
                                <input type="password" autocomplete="new-password" class="form-control flex-input"
                                    id="inputpassword" name="password" placeholder="New Password" required>
                                <a class="btn btn-primary flex-icon"
                                    style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                    id="show_password">
                                    <i class="fas fa-eye" id="icon-eye"></i>
                                </a>
                                
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
                                    • One special character (!@#$%^&*)</p>
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
                        <button type="submit" class="btn btn-primary mt-4">Reset Password</button>
                        {{-- <h6 class="forget"><a href="{{ 'sign-in' }}">Remember your password?</a></h6>
                        <p class="reset"><a href="{{ 'sign-in' }}">Log in</a></p> --}}
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
<!-- JQUERY CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
</script>
<script>
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
            
        } else {
            e.preventDefault();
            messages.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\
            <strong>Password must contain at least 8 characters, one uppercase, one lowercase, one number and one special character.</strong>\
            </div>';
        }
        
    });
</script>
@stop