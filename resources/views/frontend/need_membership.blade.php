@extends('layouts.frontend')
@section('title', 'WRMag - Buy a Membership')
@section('content')

<section id="faq" class="faqss">
    <div class="container">
        <div class="faq_divv">
            <div class="address_faq">
                <h1>WELCOME TO YOUR PROFILE</h1>
                <h3>YOU NEED TO BUY A MEMBERSHIP TO CONTINUE</h3>
                {{-- <a style="text-decoration: none" href="{{ url('memberships') }}"><h6>Click here to buy</h6></a> --}}

                <a href="{{ url('memberships') }}" id="go_memberships" class="appointment-bttn scrollto"><span class="d-none d-md-inline">CLICK HERE TO BUY</span></a>
            </div>
        </div>
</section>

@endsection

@section('css')
<style>
    @media (max-width: 767px) {

        #go_memberships {
            
            width: 100%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .address_faq h3 {
            font-size: 30px !important;
            line-height: 40px !important;
        }

        .address_faq h1 {
            margin-bottom: 30px !important;
            font-family: 'Work Sans', sans-serif !important;
            font-style: normal !important;
            font-weight: 900 !important;
            font-size: 44px !important;
            line-height: 40px !important;
        }

        .address_faq {
            margin-top: 50px;
        }
    }

    .address_faq h1 {
        color: #000;
        font-size: 55px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        text-align: center;
        line-height: 58px;
    }

    .address_faq {
        text-align: center;
    }

    .address_faq a {
        margin-top: 20px;
    }

</style>

@stop