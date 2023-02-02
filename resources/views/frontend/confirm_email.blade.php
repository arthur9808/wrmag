@extends('layouts.frontend')
@section('title', 'WRMag - Confirm Email')
@section('content')

<section id="faq" class="faqss">
        <div class="faq_divv">
            <div class="address_faq">
                <div class="message_desk">
                    <h3 class="confirm_title">PLEASE CONFIRM YOUR EMAIL <br> to ACTIVATE your FREE PROFILE.</h3>
                    <br>
                    <h4 class="confirm_title_h4">If you do not see an email, please check your SPAM folder or click below to <br> RE-SEND the confirmation email</h4>
                    <br>
                    <h4 class="confirm_title_h4">If you DO NOT confirm your email and complete the profile basics, your profile <br> will be deleted automatically</h4>
                    <br> 
                </div>
                <div class="message_mobile">
                    <h3 class="confirm_title">PLEASE CONFIRM YOUR EMAIL to ACTIVATE your FREE PROFILE.</h3>
                    <br>
                    <h4 class="confirm_title_h4">If you do not see an email, please check your SPAM folder or click below to RE-SEND the confirmation email</h4>
                    <br>
                    <h4 class="confirm_title_h4">If you DO NOT confirm your email and complete the profile basics, your profile will be deleted automatically</h4>
                    <br> 
                </div>
                <div class="academic_btn">
                    <a style="text-transform:uppercase;" class="bttnn" href="{{ url('send-confirmation-email/'.$profile->id) }}" id="go_back_button">CLICK HERE TO RESEND EMAIL</a>
                </div>
                <br>
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
                @endif
            </div>
        </div>
</section>

@endsection

@section('css')
<style>

    .academic_btn {
        margin-top: 30px;
    }
    .confirm_title {
        margin-bottom: 30px;
        font-size: 45px !important;
        text-transform: none;
    }

    .confirm_title_h4 {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 20px;
        text-align: center;
        margin-top: 20px;
    }

    .support_email {
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 20px;
        text-transform: uppercase;
        text-align: center;
        margin-top: 20px;
    }

    .support_email_a {
        color: #2DC810;
        text-transform: none;
    }

    .scrollto {
        text-transform: uppercase;
    }

    .resend_box {
        /* background: #000; */
        text-align: center;
    }

    .alert-success {
        width: 50% !important; 
        margin: 10px auto !important;
    }

    @media (max-width: 767px) {


        .address_faq h3{
            margin-top: 20px;
            font-size: 24px !important;
            line-height: 31px !important;
            font-weight: 700 !important;
        }
        .confirm_title_h4 {
            font-size: 22px;
        }

        .support_email {
            font-size: 20px !important;
        }

        #go_back_button {
            margin-top: 60px;
            font-size: 16px;
        }

        .message_desk {
            display: none;
        }

        .message_mobile {
            display: block;
            padding: 20px;
        }

        .alert-success {
            width: 90% !important; 
        }
    }

    @media (min-width: 768px) {
        .message_desk {
            display: block;
        }

        .message_mobile {
            display: none;
        }
    }
</style>
@stop

@section('js')

@stop