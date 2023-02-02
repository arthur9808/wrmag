@extends('layouts.login')
@section('title', 'WRMag - Login')
@section('content')

<section id="sign-up" class="sign_up">
    <div class="row signnn">
        <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12 left_sec">
            <div class=" left_div">
                <img src="{{ asset('template/assets/img/logo-final-grey 2.png') }}" alt="">
                <h3>Control your Brand</h3>
                <p>We want you to <b>TAKE</b> care of your brand, <b>BETTER</b> your
                    brand, and <b>MAXIMIZE</b> your recruitment opportunities
                    with the WRMag’s unlimited potential
                    platforms.</p>

                <div class="row footer_menu">
                    <div class="black-bg">
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
                    <form action="{{ url('/reset-password') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" id="inputemail" name="email"
                                placeholder="Email Address">
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
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                        <h6 class="forget"><a href="{{ 'sign-in' }}">Remember your password?</a></h6>
                        <p class="reset"><a href="{{ 'sign-in' }}">Log in</a></p>
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
    .login_titlle::after {
        right: 33%;
    }

    .sign_title::before {
        margin-left: -110px;
    }
    @media only screen and (max-width: 600px) {

        .sign_title::before {
            margin-left: -90px;
        }

        .login_titlle {
            text-align: center;
        }

        .sign_title {
            padding-left: 0px;
        }
    }

    @media only screen and (max-width: 1360px) {
        .sign_title::before {
            margin-left: -85px;
        }
    }
</style>
@stop

@section('js')
@stop