@extends('layouts.frontend')
@section('title', 'WRMag - FAQS')
@section('content')

<!-- contact  -->
<section id="faq" class="faqss">
    <div class="container">
        <div class="faq_divv">
            
            <div class="address_faq">
                <h3>EMAIL US</h3>
                <h6><a href="mailto:catch@wrmag.com" style="text-decoration:none; color:#000;">catch@wrmag.com</a></h6>
                <p>Reach out if you have any questions!</p>
            </div>
        </div>
        <div class="frequent_questions">
            <!-- Responsive FAQS -->
            @foreach($faqs as $faq)
            <div class="ques_close">
                <div class="question_left">
                    <h6>{{ $faq->question }}</h6>
                </div>
                <div class="minus_icon">
                    <img id="{{  $faq->id }}" class="faq-minus" data-answer="{{ $faq->answer }}" style="cursor: pointer;" src="{{ asset('template/assets/img/plus-faq.png') }}" alt="">
                </div>
                <div class="answer">
                    <p>{!! $faq->answer  !!}</p>
                </div>
            </div>
            @endforeach
            

        </div>
</section>
<!-- contact  -->
@endsection

@section('css')
<style>

.faq-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    /* background: #000; */

}
.faq-list {
    list-style: none;
    padding: 0;
    width: 100%;
}

.faq-list li {
    margin: 30px 0;
    box-shadow: 0px 4px 4px rgba(0,0,0,0.20);
    -webkit-box-shadow: 0px 4px 4px rgba(0,0,0,0.20);
    -moz-box-shadow: 0px 4px 4px rgba(0,0,0,0.20);
    padding: 27px 30px;
    margin: 0px auto 30px;
    text-align: left;
    width: 100%;
    min-height: 100px;
}

.faq-list .faq-heading::before {
    content: '+';
    font-size: 30px;
    display: block;
    position: absolute;
    right:0;
    top: -8px;
    color:#9A0D0D;
}

.faq-list .the-active .faq-heading::before {
    content: '-';

}

.faq-heading {
    position: relative;
    cursor: pointer;
    margin:0;
    font-size: 24px !important;
    font-family: 'Raleway' !important;
    font-weight: 700 !important;
    line-height: 28px !important;
    color: #9A0D0D !important;
}

.faq-heading:hover {
    color: var(--theme-color);
}

.faq-text {
    display: none;
}

.art-box svg {
    width:100%;
}

.read {
    color: #000;
    font-size: 16px;
    line-height: 28px;
    margin-top: 25px;
}
/* Cambia los estilos generales de las FAQS */
.accordion-flush .accordion-item .accordion-button {
    font-size: 24px !important;
    font-family: 'Raleway' !important;
    font-weight: 700 !important;
    line-height: 28px !important;
    color: #9A0D0D !important;
    min-height: 100px !important;
}

.res_faq {
    color: #000;
    font-size: 18px;
    line-height: 28px;
    margin-top: 25px;
}

/* Cambia el icono de la flecha que trae por defecto */
.accordion-button::after {
    background-image: none;
    content: '+';
    font-size: 40px;
    color:#9A0D0D;
}

.accordion-button:not(.collapsed)::after {
    background-image: none;
    transform: rotate(0deg);
    content: '-';
}

/* Le da espacio entre el telefono y el correo */
.address_faq {
    margin-top: 25px;
}

/* Elimina el HR de las preguntas frecuentes */
.accordion-item {
    background-color: #fff;
    border: 0px solid rgba(0,0,0,.125);
}

/*Agregamos margen a las preguntas frecuentes*/
.accordion-flush .accordion-item {
    margin-bottom: 30px;
}

.accordion-flush .accordion-item .accordion-header {
    box-shadow: 0px 4px 4px rgba(0,0,0,0.20);
    -webkit-box-shadow: 0px 4px 4px rgba(0,0,0,0.20);
    -moz-box-shadow: 0px 4px 4px rgba(0,0,0,0.20);
    border-radius: 8px;
    margin-bottom: 20px;
    border-radius: 5px;
}

/* Sombras azules */
.accordion-button:not(.collapsed) {
    color: #ff0000 !important;
    background-color: #fff;
    box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
}

.accordion-button:focus {
    z-index: 3;
    border-color: #ff0000 !important;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(255 0 0 / 25%);
}

@media only screen and (max-width: 600px) {
    .accordion-flush .accordion-item .accordion-button {
        font-size: 14px !important;
        font-family: 'Raleway' !important;
        font-weight: 700 !important;
        line-height: 28px !important;
        color: #9A0D0D !important;
        min-height: 100px !important;
    }

    .faq-heading {
        font-size: 14px !important;
    }

    .faq-list li {
        padding: 30px 20px;
    }

    .faq-list .faq-heading::before {
        font-size: 30px;
        display: block;
        position: absolute;
        right: 0;
        top: -20px;
        color: #9A0D0D;
    }

    #faq > div > div.faq_divv > div > p {
        font-size: 18px;
    }

    .ques_close {
        min-height: 100px !important;
    }

}

    .faq_res {
        cursor : pointer;
    }

    #faq > div > div.faq_divv > div > p {
        font-weight: 600;
    }

    .address_faq {
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

    .ques_close {
        min-height: 130px;
    }

    .ques_close:hover {
        cursor: pointer;
    }

    .question_left h6 {
        color: #000;
        font-weight: bold !important;
    }

    .answer {
        display: none;
    }

    .answer-show {
        display: inline-block;
        animation: slideDown 0.8s;
    }

    /* kEYFRAME ANIMATION SLIDE DOWN */
    @keyframes slideDown {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 960px max y 660px min */
    @media (max-width: 960px) and (min-width: 660px) {
        .question_left h6 {
            font-size: 20px;
        }
    }


</style>
@stop

@section('js')
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $('.faq_res ').click(function () {
        //Imprimimos sus hijos
        var hijos = $(this).children();
        $(this).toggleClass('the-active').find('.faq-text').slideToggle();
        // console.log(hijos);
    });
</script>
<script>
    var faqs = document.getElementsByClassName('ques_close');
    for (var i = 0; i < faqs.length; i++) {
        faqs[i].addEventListener('click', function() {
            //Obtener el id del elemento que disparó el evento
            var id = this.id;
            var parent = this.children[1];
            var icon = parent.children[0];
            if (icon.src.includes('plus-faq.png')){
                icon.src = "{{ asset('template/assets/img/minus.png') }}";
                const answer = this.children[2]
                answer.classList.add('answer-show');
            } else {
                //Le cambiamos el icono de plus a minus
                icon.src = "{{ asset('template/assets/img/plus-faq.png') }}";
                var answer = this.children[2];
                // Removemos la clase answer-show
                answer.classList.remove('answer-show');
            }
        });
    }
</script>
@stop