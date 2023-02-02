@extends('layouts.frontend')
@section('title', 'WRMag - Contact')
@section('content')
<!-- contact  -->
<section id="contactt" class="contact_us">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 left_contact">
            <div class="left_divv">
                <h4>contact us</h4>
                <div class="container">
                    <div class="address">
                        <h5>EMAIL US</h5>
                        <p><a href="mailto:catch@wrmag.com" style="text-decoration:none; color:#000;">catch@wrmag.com</a></p>
                        <p>Reach out if you have any questions!</p>
                    </div>
                    <!-- Alert -->
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
                    <!-- End Alert -->
                </div>
                
                <div class="container">
                    <form class="formm" id="contact" action="{{ url('/contactus') }}" method="POST">
                        @csrf
                        <x-honeypot />
                        <div class="form-row">
                            <div class="options_contact">
                                <div class="form-group" id="radio_contact">
                                    <input class="form-check-input" type="radio" name="who_is" id="exampleRadios1"
                                        value="General" required>
                                    <label class="form-check-label" for="exampleRadios1">
                                        General
                                    </label>
                                </div>
                                <div class="form-group" id="radio_contact">
                                    <input class="form-check-input" type="radio" name="who_is" id="exampleRadios2"
                                        value="Parent" required>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Parent
                                    </label>
                                </div>
                                <div class="form-group" id="radio_contact">
                                    <input class="form-check-input" type="radio" name="who_is" id="exampleRadios2"
                                        value="Athlete" required>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Athlete
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="athlete_name" class="contact_label">Athlete Name <span class="star_required">*required</span></label>
                                    <input type="text" class="form-control" id="athlete_name" name="athlete_name"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="parent_name" class="contact_label">Parent/Guardian Name <span class="star_required">*required</span></label>
                                    <input type="text" class="form-control" id="parent_name" name="parent_name"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="input_grade" class="contact_label"> Current Grade <span class="star_required">*required</span></label>
                                    <input type="text" class="form-control" id="input_grade" name="grade"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="input_email" class="contact_label">Email <span class="star_required">*required</span></label>
                                    <input type="email" class="form-control" id="input_email" name="input_email"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="secondary_email" class="contact_label">Secondary Email <span class="star_required">*required</span></label>
                                    <input type="email" class="form-control" id="secondary_email" name="secondary_email"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="phone" class="contact_label">Phone <span class="star_required">*required</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="input_city" class="contact_label">City/State <span class="star_required">*required</span></label>
                                    <input type="text" class="form-control" id="input_city" name="input_city"
                                        placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="message" class="contact_label">Your Goals <span class="star_required">*required</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder=""
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                        </div>

                        <button type="submit" class="bttnn mt-4">SEND MESSAGE</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    </div>
</section>
<!-- contact  -->
@endsection

@section('css')
<style>

    .left_divv {
        width: 100% !important;
        padding-top: 320px !important;
        padding-bottom: 70px !important;
        margin: 0px auto !important;
    }

    .options_contact {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        /* background: red; */
        margin: 15px auto;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
    }

    .star_required {
        color: red;
    }
    @media (max-width: 767px) {
        .left_divv {
            text-align: center;
        }
    }

    @media only screen and (max-width: 600px) {
        /* *{
            overflow-x: hidden;
        } */
        #contactt > div > div > div > div:nth-child(3) > p {
            font-size: 20px;
        }

        .formm label {
            font-size: 14px;
        }

        /* Zoom Out */
        .left_divv h4 {
            font-size: 40px;
        }

        .left_divv {
            padding-top: 190px !important;
        }


        .left_divv p {
            font-size: 20px;
        }

        .address h5 {
            font-size: 26px;
        }

        #contactt > div > div > div > div:nth-child(4) > p > a {
            font-size: 20px;
        }

        #contactt > div > div > div > div:nth-child(4) {
            margin-bottom: 29px !important;
        }

        .left_divv p {
            text-align: start;
        }


    }

    .left_divv p {
        font-weight: 600;
    }


    #contactt > div > div.col-xl-6.col-lg-6.col-sm-12.col-xs-12.left_contact > div > div:nth-child(4) {
        margin-top: 15px;
    }

    #radio_contact {

    }

    @media (max-width: 767px) {
        /* #radio_contact {
            padding: 21px 0px 7px 27px !important;
            display: inline-block;
        } */

    }


    @media (min-width:1550px) {
        #radio_contact {
            padding: 21px 0px 0px 67px; 
            display: inline-block;
        }

        #radio_contact .form-check-input {
            float: left;
            margin-left: -1.5em;
        }
    
    }
    .form-check-input {
        border: 1px solid #ff0000;
    }

    .form-check-input:checked {
    background-color: #ff0000;
    border-color: #ff0000;
    }

    

    #radio_contact {
            /* padding: 21px 0px 7px 27px !important; */
            margin: 5px 10px;
            display: inline-block;
        }

        .faq_res {
        cursor : pointer;
    }

    #faq > div > div.faq_divv > div > p {
        font-weight: 600;
    }

    .address {
        display: flex;
        /* margin-top: 25px; */
        flex-direction: column;
        align-items: start;
        margin: 25px auto;
    }

    .faq_divv {
        margin: 0px 100px;
    }

    @media (max-width: 767px) {
        .faq_divv {
            margin: 0px 10px;
        }
    }
    

    

</style>
<script src="https://www.google.com/recaptcha/api.js"></script>

@stop

@section('js')
<script>
    var radios = document.getElementsByName('who_is');
    function checkradios() {
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                return true;
            }
        }
        var alert = document.createElement('div');
        alert.className = 'alert alert-danger';
        alert.innerHTML = 'Please select one option';
        document.getElementsByClassName('form-group')[document.getElementsByClassName('form-group').length - 1].appendChild(alert);
        return false;
    }

</script>
<script>
    const first_email = document.getElementById('input_email');
    const second_email = document.getElementById('secondary_email');
    const form = document.getElementById('contact');

    form.addEventListener('submit', (e) => {
        if (first_email.value == second_email.value) {
            second_email.style.border = '1px solid red';
            var alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            alert.innerHTML = 'The email is equal to the first email';
            document.getElementsByClassName('form-group')[document.getElementsByClassName('form-group').length - 1].appendChild(alert);
            e.preventDefault();

        } else {
            second_email.style.border = '1px solid #ced4da';
            document.getElementsByClassName('alert alert-danger')[0].remove();
        }
    });
</script>


@stop