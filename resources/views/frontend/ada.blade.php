@extends('layouts.frontend')
@section('title', 'Accesibility - ADA')
@section('content')
<section id="faq" class="faqss">
    <div class="container">
        <div class="faq_divv">
            <div class="address_faq">
                <h3>ACCESSIBILITY STATEMENT FOR WRMAG</h3>
                <p>
                    WRMAG is committed to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone, and applying the relevant accessibility standards.
                </p>
                <h4>CONFORMANCE STATUS</h4>
                <p>
                    The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA. Bestia is fully conformant with WCAG 2.1 level AA. Fully conformant means that the content fully conforms to the accessibility standard without any exceptions.
                </p>
                <h4>FEEDBACK</h4>
                <p>
                    We welcome your feedback on the accessibility of WRMAG. Please let us know if you encounter accessibility barriers on WRMAG:
                </p>
                <p>
                    {{-- <strong>Phone: </strong> +1 (844) 888-8888 <br> --}}
                    <strong>Email: </strong> <a href="mailto:catch@wrmag.com"> catch@wrmag.com</a> <br>
                    {{-- <strong>Postal Address: </strong> --}}
                </p>
                <p>
                    We try to respond to feedback within 2 business dayss <br>
                    This statement was created on 24 May 2022 using the W3C Accessibility Statement Generator Tool.
                </p>
            </div>
        </div>
</section>

@endsection

@section('css')
<style>
    h3, h4 {
        text-align: left !important;
        font-style: normal;
        font-weight: 900;
        line-height: 65px;
        text-transform: uppercase;
    }
    h4 {
        font-size: 45px;
        font-weight: 800;
        font-family: 'Raleway';
        line-height: 58px;
        color: #000;
        margin-top: 30px;
    }

    p {
        font-size: 21px;
        line-height: 32px;
        text-align: left !important;
    }

    a {
        text-decoration: none;
        color: #000;
        line-height: 32px;
    }
</style>
@stop

@section('js')

@stop