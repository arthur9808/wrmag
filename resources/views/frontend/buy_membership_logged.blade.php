@extends('layouts.login')
@section('title', 'WRMag - Buy Membership')
@section('content')

<section id="sign-up" class="sign_up">
    <div class="row signnn">
        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 left_sec">
            <div class=" left_div">
                <img src="{{ asset('template/assets/img/logo-final-grey 2.png') }}" alt="">
                <h3>MARKET YOUR RECRUITMENT</h3>
                <p>At the WRMag our members are our family and we want our
                    family to succeed. We want our family to utilize our platforms to get the maximum exposure possible leading to college recruitment. 
                    We’re
                    the ONLY Quarterback recruiting platform to offer our own in-house digital magazine along
                    with a wide-reaching social media network that continues to grow. WRMag has also been
                    featured by publications like Sports Illustrated, Bleacher Report, SportsCenter ESPN, and is
                    also known internationally.
                </p>
                <p class="left_message">Once you complete your payment, our team will reach out to you via e-mail. Thank you!</p>
                <h4>EMAIL US</h4>
                <h5><a clas="tel_payment" href="mailto:catch@wrmag.com">catch@wrmag.com</a></h5>
                <p>Reach out before if you have any questions</p>

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

                                <form role="form" action="{{ url('/complete-payment-logged') }}" method="POST"
                                    class="require-validation" data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                    @csrf
                                    <div class='row standard'>
                                        <div class='col-6 form-group required'>
                                            <input type="hidden" name="membership_id" value="{{ $membership->id }}">
                                            <input class='form-control' id="inputname" name="f_name" type='text'
                                                placeholder="First Name" value="{{ $profile->f_name }}" required
                                                disabled>
                                        </div>
                                        <div class='col-6 form-group required'>
                                            <input class='form-control' id="inputname" name="l_name" type='text'
                                                placeholder="Last Name" value="{{ $profile->l_name }}" required
                                                disabled>
                                        </div>
                                    </div>
                                    <div class='row standard'>
                                        <div class='col-6 form-group required'>
                                            <input class='form-control' id="inputemail" name="email" type='email'
                                                placeholder="Email" value="{{ $profile->qb_email }}" required disabled>
                                        </div>
                                        <div class='col-6 form-group required'>
                                            <input class='form-control' id="inputusername" name="username" type='text'
                                                placeholder="Username" value="{{ $profile->username }}" required
                                                disabled>
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
                                            <input autocomplete='off' class='form-control card-cvc' size='4' type='text'
                                                id="cvc" placeholder="CVC" required>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <input class='form-control card-expiry-month' placeholder='MM' size='2'
                                                id="exp_month" type='text' required>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                id="exp_year" type='text' required>
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

                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ${{
                                                $membership->price }}</button>
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
    .right_sec_con {
        padding-top: 250px !important;
        padding-bottom: 50px !important;
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

    .is-valid {
        border-color: #28a745;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .hide {
        /* visibility: hidden; */
        display: none;
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

        .right_sec_con {
            padding-top: 100px !important;
        }
    }
</style>
@stop

@section('js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function () {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
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
<script>
    //Validate payment form
    const passwrod = document.getElementById('inputpassword');
    //Validar que la contraseña contenga 8 o más caracteres
    const re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

    const card_name = document.querySelector('#name_card');
    // card_name debe solo aceptar letras, sí escribe números o caracteres especiales, se eliminan
    /* card_name.addEventListener('keypress', function (e) {
        var regex = new RegExp("^[a-zA-Z\b]+$");
        var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (!regex.test(key)) {
            e.preventDefault();
            return false;
        }
    }); */

    const card_number = document.querySelector('#card_number');
    const cvc = document.querySelector('#cvc');
    const exp_month = document.querySelector('#exp_month');
    const exp_year = document.querySelector('#exp_year');

    // Si esta escribiendo en cualquier input, si escribe letras o caracteres especiales, se eliminan
    card_number.addEventListener('keypress', function (e) {
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

    cvc.addEventListener('keypress', function (e) {
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

    exp_month.addEventListener('keypress', function (e) {
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

    exp_year.addEventListener('keypress', function (e) {
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
@stop