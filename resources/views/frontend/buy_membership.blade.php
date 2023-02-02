@extends('layouts.login')
@section('title', 'WRMag - Buy Membership')
@section('content')

    <section id="sign-up" class="sign_up">
        <div class="row signnn">
            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 left_sec">
                <div class=" left_div">
                    <div class="qb_logo">
                        <img src="{{ asset('template/assets/img/3QB-Magazine-logo.png') }}" alt="" onclick="window.location.href='{{ url('/') }}'">
                    </div>
                    <div class="checkout-content">
                        <div class="checkout-content-body">
                            <div class="logo_payment">
                                <img src="{{ asset('template/assets/img/stripe_payment.png') }}" class="stripe_payment" alt="">
                            </div>
                            <h3>{{ $membership->name }} UPGRADE</h3>
                            <div class="price_box">
                                <p>
                                    <span class="price">${{ $membership->price }}/mo</span> <br>
                                    <span class="billed_monthly">per athlete per month</span>
                                </p>
                            </div>
                            <?php 
                            /* Total Savings / year */
                            $total_savings = $membership->previous_price - $membership->price;
                            $total_savings = $total_savings * 12;
                            ?>
                            <div class="strike_price">
                                <span class="previous_price">${{ $total_savings }} Total savings / year</span>
                                <br>
                                <span class="previous_price">Lock in now before price increases!</span>
                            </div>
                            <div class="benefits">
                                <p class="features_title">You'll get access to:</p>
                                <div class="benefits_icon_list">
                                    @foreach($membership->benefits as $feature)
                                        @if($feature->is_shared)
                                            <div class="benefit_item">
                                                <div class="benefit_icon">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                                <div class="benefit_name">
                                                    <p>{{ $feature->name }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @foreach($membership->benefits as $feature)
                                        @if(!$feature->is_shared)
                                            <div class="benefit_item">
                                                <div class="benefit_icon">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                                <div class="benefit_name">
                                                    <p>{{ $feature->name }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <p class="left_message">
                                After your payment, our team will reach out to you via e-mail. Please allow 24-48 hours to process your paid membership / upgrade.
                                <br> <br>
                                We're excited to work with you!!
                            </p>

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
                                    <form role="form" action="{{ url('/complete-payment') }}" method="post"
                                        class="require-validation" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                        @csrf
                                        <div class='row standard'>
                                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class='form-group required'>
                                                    <input type="hidden" name="membership_id"
                                                        value="{{ $membership->id }}">
                                                    <input class='form-control' id="inputname" name="f_name" type='text'
                                                        placeholder="First name" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class='form-group required'>
                                                    <input class='form-control' id="inputname" name="l_name" type='text'
                                                        placeholder="Last name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row standard'>
                                            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                                <div class='form-group required'>
                                                    <input class='form-control' id="inputemail" name="email"
                                                        type='email' placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row standard'>
                                            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                                <div class='form-group required'>
                                                    <input class='form-control' id="inputusername" name="username"
                                                        type='text' placeholder="Username" required>
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
                                        <div id="hide_payment">
                                            <div class='row standard'>
                                                <div class='col-xl-12 col-lg-12 col-sm-12 col-xs-12 form-group required'>
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
                                            <div class='row standard'>
                                                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 form-group">
                                                    <div class="password-input">
                                                        <input type="password" autocomplete="new-password"
                                                            class="form-control flex-input" id="inputpassword2"
                                                            name="inputpassword2" placeholder="Confirm Password" required>
                                                        <a class="btn btn-primary flex-icon"
                                                            style="margin-left: 5px; margin-top: 15px; width:auto; height: 50px; padding: 10px;"
                                                            id="show_password2">
                                                            <i class="fas fa-eye" id="icon-eye2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row standard'>
                                                <div class='col-xs-12 form-group required'>
                                                    <input class='form-control' id="name_card" type='text'
                                                        placeholder="Name on Card" required>
                                                </div>
                                            </div>

                                            <div class='row standard'>
                                                <div class='col-xs-12 form-group required'>
                                                    <input autocomplete='off' class='form-control card-number' id="card_number"
                                                        size='20' type='text' placeholder="Card Number" required>
                                                </div>
                                            </div>

                                            <div class='row standard'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <input autocomplete='off' class='form-control card-cvc' size='4'
                                                        type='text' id="cvc" placeholder="CVC" required>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <input class='form-control card-expiry-month' placeholder='MM'
                                                        size='2' id="exp_month" type='text' required>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <input class='form-control card-expiry-year' placeholder='YYYY'
                                                        size='4' id="exp_year" type='text' required>
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
                                                    <input class="form-check-input" type="checkbox" id="terms"
                                                        name="terms" required>
                                                    <label class="form-check-label" for="terms">
                                                        I agree to all statments include in <a
                                                            href="{{ url('privacy-policy') }}"><span class="red-colr">Terms of
                                                                Use</span></a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Alert to show messages -->
                                        <div id="messages">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    <strong>{{ Session::get('success') }}</strong>
                                                </div>
                                            @endif
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
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
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" id="pay-button">Pay Now
                                                    ${{ $membership->price }}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-xs-12" id="loader-content">
                                            <div class="pay_loader">
                                                <div class="lds-dual-ring"></div>
                                            </div>
                                            <div class="text_loader">
                                                <p>Processing Payment...<br>
                                                    Please do not refresh or close this page.</p>
                                            </div>
                                        </div>
                                    </div>
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

        .stripe_payment {
            width: 400px !important;
        }

        .features_title {
            text-align: left !important;
        }
        
        .left_div { 
            width: 100% !important;
            padding: 30px 50px 100px !important;
        }

        .price_box {
            margin: 30px 0px;
        }

        .montly_plan {
            
            font-size: 30px !important;
            font-weight: 900 !important;
            line-height: 10px !important;
        }

        .benefits_icon_list {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            margin-left: 50px;
        }

        .benefit_icon > i {
            float: left !important;
            font-size: 13px !important;
            color: #000 !important;
            padding-top: 12px !important;
            padding-left: 38px !important;
        }

        .benefit_item {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-content: center;
            margin-left: 50px;
            gap: 10px;
            margin-bottom: -25px;
        }

        .benefit_name {
            min-width: 300px;
        }
        .benefit_name > p {
            text-align: start !important;
        }

        .price {
            font-family: 'Work Sans', sans-serif !important;
            color: #000 !important;
            font-size: 40px !important;
            font-weight: 900 !important;
            line-height: 15px !important;
        }

        .billed_monthly {
            font-size: 20px !important;
            font-weight: 900 !important;
            line-height: 15px !important;
        }

        .previous_price {
            font-family: 'Work Sans', sans-serif !important;
            color: #000 !important;
            font-size: 22px !important;
            font-weight: 900 !important;
            line-height: 32px !important;
        }


        .strike_price {
            text-align: center;
            margin: 35px 0px;
        }

        .features_title {
            font-family: 'Work Sans', sans-serif !important;
            color: #000 !important;
            font-size: 22px !important;
            font-weight: 900 !important;
            line-height: 32px !important;
            margin-bottom: 5px;

        }

        .left_message {
            color: #2DC810 !important;
            font-weight: 900 !important;
            margin-top: 30px;
        }

        .benefits {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 25px 0px 50px;
        }
        
        .right_sec_con {
            padding-top: 80px !important;
            padding-bottom: 50px !important;
        }

        .upgrade_membership {
            margin-top: 20px;
            font-family: 'WorK sans', sans-serif !important;
            text-transform: uppercase;
            font-weight: 600 !important;
            color: #2DC810 !important;
        }

        .logo_payment {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 25px 0px;
        }

        .qb_logo {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qb_logo > img:hover {
            cursor: pointer;
        }

        .left_sec p {
            padding-right: 0px !important;
        }


        .left_sec h3 {
            font-size: 30px;
            text-align: center;
            margin: 25px 0px;
        }

        #checkout-content-body {
            text-align: center;
        }

        .panel-title {
            display: inline;
            font-weight: bold;
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

        .radio_btn {
            display: flex;
            padding-top: 53px;
            justify-content: center;
            text-align: center;
            /* align-content: space-between; */
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
        }

        @media only screen and (max-width: 768px) {
            .special_character {
                margin-left: 20px !important;
            }

            .left_div {
                padding: 30px 50px 20px !important;
            }

            .stripe_payment {
                width: 300px !important;
            }

            .logo_payment {
                margin: 10px 0px;
            }

            .left_sec h3 {
                font-size: 30px !important;
                margin: 25px 0px;
            }

            .price_box {
                margin: 60px 0px 20px;
            }

            .features_title {
                
                margin-bottom: 10px;
            }

            .left_message {
                margin: 40px 0px 0px;
            }

            .benefits_icon_list {
                margin-left: 10px;
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

        section#sign-up .col-xl-6 {
            height: auto;
        }

        section {
            overflow: auto;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        /* Center elements */
        
        .left_sec p {
            /* padding-right: 50px; */
            text-align: center;
        }

        #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.left_sec > div > div > div > h4, #sign-up > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.left_sec > div > div > div > h5 {
            text-align: center;
            padding-right: 60px;
        }
    </style>
@if($membership->name == "STARTER" || $membership->name = "PRACTICE SQUAD")
    <style>
        @media only screen and (max-width: 768px) {
            .benefits_icon_list {
                margin-left: -50px;
            }
        }
    </style>
@endif
@if($membership->name == "ALL-PRO")
    <style type="text/css">
        section#sign-up .signnn {
            height: 165vh !important;
        }

        .right_sec_con {
            padding-top: 250px !important;
            padding-bottom: 50px !important;
        }

        @media only screen and (max-width: 768px) {
            section#sign-up .signnn {
                height: auto !important;
            }

            .right_sec_con {
                padding-top: 10px !important;
                padding-bottom: 50px !important;
            }

            .benefits_icon_list {
                margin-left: -50px;
            }
        }
    </style>
@endif
@stop

@section('js')

    <!-- Libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <!-- End Libraries -->

    <!-- Password Show Hide -->
    <script>
        const messages = document.querySelector('#messages');
        const validate_email = (email) => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const email_input = document.getElementById('inputemail');
        email_input.addEventListener('keyup', function () {
            const email = email_input.value;
            if (validate_email(email)) {
                email_input.classList.remove('is-invalid');
                email_input.classList.add('is-valid');
                messages.innerHTML = '';
                document.getElementById('pay-button').classList.remove('hide');
                
            } else {
                email_input.classList.remove('is-valid');
                email_input.classList.add('is-invalid');
                messages.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>Invalid Email!</strong> Please enter a valid email address.\
                </div>';
                document.getElementById('pay-button').classList.add('hide');
            }
        });

        const togglePassword = document.querySelector('#show_password');
        const password = document.querySelector('#inputpassword');
        const icon = document.querySelector('#icon-eye');
        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            icon.classList.toggle('fa-eye-slash');
        });

        //Show confirm password
        const togglePassword2 = document.querySelector('#show_password2');
        const password2 = document.querySelector('#inputpassword2');
        const icon2 = document.querySelector('#icon-eye2');
        togglePassword2.addEventListener('click', function(e) {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            icon2.classList.toggle('fa-eye-slash');
        });

        let valid_password = false;
        let double_validate = false;
        
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
    </script>
    <!-- End Password Show Hide -->

    <script type="text/javascript">
        $(function() {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                    $('#pay-button').hide();
                    $('#loader-content').show();
                    $('#hide_payment').hide();
                    $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        if ($input.attr('name') == 'parent_name' || $input.attr('name') == 'parent_email') {
                            
                        } else {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                        }
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                    setTimeout(function() {
                        $('.error').addClass('hide');
                    }, 5000);
                    $('#pay-button').show();
                    $('#loader-content').hide();
                    $('#hide_payment').show();
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

    <!-- Form Payment Validation -->
    <script>
        const card_name = document.querySelector('#name_card');
        const card_number = document.querySelector('#card_number');
        const cvc = document.querySelector('#cvc');
        const exp_month = document.querySelector('#exp_month');
        const exp_year = document.querySelector('#exp_year');

        // Si esta escribiendo en cualquier input, si escribe letras o caracteres especiales, se eliminan
        card_number.addEventListener('keypress', function(e) {
            if (this.value.length >= 20) {
                e.preventDefault();
                return false;
            }
            var regex = new RegExp("^[0-9\b]+$");
            var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (!regex.test(key)) {
                e.preventDefault();
                return false;
            }
        });

        cvc.addEventListener('keypress', function(e) {
            if (this.value.length >= 4) {
                e.preventDefault();
                return false;
            }
            var regex = new RegExp("^[0-9\b]+$");
            var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (!regex.test(key)) {
                e.preventDefault();
                return false;
            }
        });

        exp_month.addEventListener('keypress', function(e) {
            if (this.value.length >= 2) {
                e.preventDefault();
                return false;
            }
            var regex = new RegExp("^[0-9\b]+$");
            var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (!regex.test(key)) {
                e.preventDefault();
                return false;
            }
        });

        exp_year.addEventListener('keypress', function(e) {
            if (this.value.length >= 4) {
                e.preventDefault();
                return false;
            }
            var regex = new RegExp("^[0-9\b]+$");
            var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (!regex.test(key)) {
                e.preventDefault();
                return false;
            }
        });
    </script>
    <!-- End Form Payment Validation -->
@stop
