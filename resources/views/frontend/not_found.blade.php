@extends('layouts.frontend')
@section('title', 'Magazine - 404 Page Not Found')
@section('content')

<section id="faq" class="faqss">
    <div class="container">
        <div class="faq_divv">
            {{-- <p>404</p> --}}
            <div class="address_faq">
                <h3></h3>
                <h4>{{ $message }}</h2>
                <div class="academic_btn">
                    <a style="text-transform:uppercase;" class="bttnn" href="" id="go_back_button">Click here to go back</a>
                </div>
            </div>
        </div>
</section>

@endsection

@section('css')
<style>
    .address_faq h3 {
        text-transform: uppercase;
    }

    .address_faq h4 {
        font-size: 45px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        text-align: center;
        line-height: 40px;
        color: #2DC810;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    @media (max-width: 767px) {
        .address_faq h4 {
            margin-top: 20px;
            font-size: 25px;
            font-weight: 700;
            font-family: 'Work Sans', sans-serif;
            text-align: center;
            line-height: 30px;
            color: #2DC810;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        #go_back_button {
            font-size: 16px;
        }
    }
</style>
@stop

@section('js')
<script>
    const go_back_button = document.getElementById('go_back_button');

    go_back_button.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>
@stop