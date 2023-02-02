@extends('layouts.frontend')
@section('title', 'WRMag - Coach')
@section('content')
<section id="coach_detail" class="coach_detail_page">
    <div class="coach_bg" style = "background-image: url('{{ asset('storage/'.$coach->image) }}')">
        <div class="coach_content">
            {{-- <img src="{{ asset('template/assets/img/wr.png') }}" class="image" alt=""> --}}
            <!-- Img with coach logo -->
            @if ($coach->coach_logo)
                <img src="{{ asset('storage/'.$coach->coach_logo) }}" class="image" alt="" width="154px" height="154px">
            @endif
            <h1>{{ $coach->f_name . ' ' . $coach->l_name }}</h1>
            <h5>{{ $coach->title }}</h5>
            <h6>{{ $coach->city }}, {{ $coach->state }}</h6>
            <h6><a href="tel:{{ $coach->phone }}" style="color:#fff; text-decoration:none;">{{ $coach->phone }}</a></h6>
            <h6><a href="mailto:{{ $coach->email }}" style="color:#fff; text-decoration:none;">{{ $coach->email }}</a></h6>
            <div class="biography">
                <p>
                    <?php
                        $biography = $coach->bio;
                        $biography = str_replace("\n", "<br>", $biography);
                    ?> 
                    <!-- Print a html string -->
                    {!! $biography !!}
                </p>
            </div>
            <div class="icons_coach">
                @if($coach->instagram)
                <a href="https://www.instagram.com/{{ $coach->instagram }}"><i class="fab fa-instagram"></i></a>
				@endif
                @if($coach->twitter)
                <a href="https://twitter.com/{{ $coach->twitter }}"><i class="fab fa-twitter"></i></a>
				@endif
                @if($coach->tiktok)
                <a href="https://www.tiktok.com/{{ '@'.$coach->tiktok }}"><i class="fab fa-tiktok"></i></a>
				@endif
                @if($coach->facebook)
                <a href="{{ $coach->facebook }}"><i class="fab fa-facebook"></i></a>
                @endif
            </div>
        </div>
    </div>
</section>
@if($featured_images != null)
<section class="slider_feature">
    <div class="container ">
        <div class="column_of_four">
            <h4 class="coach_slider">FEATURED PHOTOS</h4>

            <div class="masonry_gallery">
                @foreach($featured_images as $photo)
                    <img src="{{ asset('storage/'.$photo) }}"> 
                @endforeach
            </div>

        </div>
    </div>
</section>
@endif

<section class="coach_data">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="left_table">
                    @if($upconmingCamps['date'][0] != null)
                        @if($upconmingCamps)
                        <h2>UPCOMING CAMPS</h2>
                        <table class="table table_bg">
                            <thead>
                                <tr>
                                    {{-- <th scope="col-3" class="table_camps">Camp </th> --}}
                                    <th scope="col-3" class="table_camps">Date</th>
                                    <th scope="col-3" class="table_camps">Location</th>
                                    <th scope="col-3" class="table_camps">Link</th >
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($upconmingCamps['date']); $i++)
                                <?php
                                    $date_start = date('M jS, Y', strtotime($upconmingCamps['date'][$i]));
                                    $date_end = $upconmingCamps['end_date'][$i] ? date('M jS, Y', strtotime($upconmingCamps['end_date'][$i])) : null;
                                    if($date_end == null){ 
                                        $date_complete = $date_start;
                                    } else {
                                        $date_complete = $date_start . ' - ' . $date_end;
                                    }
                                ?>
                                @if($upconmingCamps['date'][0] != null)
                                <tr>

                                    <td class="table_camps">{{ $date_complete }}</td>
                                    <td class="table_camps">{{ $upconmingCamps['location'][$i] }}</td>
                                    <td class="table_camps">
                                        @if($upconmingCamps['link'][$i])
                                        <a style="text-decoration:none; color:#fff" href="{{ $upconmingCamps['link'][$i] }}">Register Now</a>
                                        @else
                                        <a style="text-decoration:none; color:#fff" href="">Link not available</a>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endfor

                            </tbody>
                        </table>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="right_table">
                    {{-- {{ dd($college_nfl_qbs_trained ) }} --}}
                    @if($college_nfl_qbs_trained['name'][0] != null)
                        @if($college_nfl_qbs_trained)
                        <h2> COLLEGE / NFL QUARTERBACK TRAINED</h2>
                        <table class="table table_bg">
                            <thead>
                                <tr>

                                    <th scope="col" class="table_camps">Name of QB</th>
                                    <th scope="col" class="table_camps">College / NFL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($college_nfl_qbs_trained['name']); $i++)
                                    @if($college_nfl_qbs_trained['name'][0] != null)
                                    <tr>
                                        <td class="table_camps">{{ $college_nfl_qbs_trained['name'][$i] }}</td>
                                        <td class="table_camps">{{ $college_nfl_qbs_trained['college'][$i] }}</td>
                                    </tr>
                                    @endif
                                @endfor
                            </tbody>
                        </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@if($coach->banner_title)
<section class="check_out">
    <h1 style="text-transform:uppercase;"> {{ $coach->banner_title }} </h1>
    <div class="academic_btn">
        @if($coach->website)
        <?php 
            if($coach->website == 'N/A' || $coach->website == null || $coach->website == ''){
                $website = '/';
            } else {
                $website = $coach->website;
            }
        ?>
            @if($website != '/')
            <a class="bttnn"  href="{{ $website }}" target="_blank">VISIT WEBSITE</a>
            @endif
        @else
        {{-- <a class="bttnn"  href="{{ url('/') }}" target="_blank">VISIT WEBSITE</a> --}}
        @endif
    </div>
</section>
@endif
<!-----slider----->

<section id="magazine_profile" class="slider coachh_slider">
    <div class="container">
        <div class="row pictures" id="content_articles">
            
            
        </div>
    </div>
    <div class="container">
        <div class="my-5 text-center ">
            <div class="row mb-2">
                <div class="col text-center">
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div id="lightbox">
                    <div class="close-lightbox">
                        <!-- ICON -->
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                    <div class="lightbox-content">
                        <!-- Image -->
                        <div class="lightbox-image">

                        </div>

                        <!-- Arrows -->
                        <div class="arrows">
                            <div class="arrow arrow-left">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </div>
                            <div class="arrow arrow-right">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
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
<style>

    .table_bg {
        background: #1b1b1b;
        color: #cecece;
        border-radius: 0px !important;
        border: 1px solid #cecece !important;
    }

    .left_table .table th {
        font-size: 18px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        line-height: 26px;
        text-transform: uppercase;
        color: #cecece;
        text-align: center;
        border-bottom: 1px solid #cecece;
    }

    .left_table .table td {
        font-size: 18px;
        font-family: 'Raleway';
        font-weight: 600;
        color: #cecece;
        line-height: 21px;
        padding-top: 17px;
        border-bottom-color: #cecece;
        text-align: center;
    }

    .table_right_bg {
        background: #1b1b1b;
        border: 1px solid #cecece !important;
        border-radius: 0px !important;
    }

    .right_table .table th {
        font-size: 18px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        line-height: 26px;
        text-transform: uppercase;
        color: #cecece;
        text-align: center;
        border-bottom: 1px solid #cecece;
    }

    .right_table .table td {
        font-size: 18px;
        font-family: 'Raleway';
        font-weight: 600;
        color: #cecece;
        line-height: 21px;
        padding-top: 17px;
        border-bottom-color: #cecece;
        text-align: center;
    }

    .table_camps {
        border: 1px solid #cecece !important;
    }


    .check_out h1 {
        font-size: 60px;
    }

    .carousel-nav-icon img {
        width: 24px !important;
    }

    .coach_content h5 {
        margin-top: 15px;
    }

    .biography {
        margin-top: 20px;
        height: auto;
        width: 50%;
        margin: 20px auto;
    }

    .icons_coach a {
        margin: 10px 25px;
    }

    .icons_coach a i {
        font-size: 60px;
        color: #fff;
    }

    #visit_website {
        font-size: 30px;
    }

    @media only screen and (max-width: 600px)  {
        .biography {
            width: 90% !important;
        }

        .icons_coach {
            margin: 40px auto;
        }

        .carousel-nav-icon img {
            margin-bottom: 40px;
        }

        body > section.slider_feature > div > div > div > div.row.d-flex.align-items-center > div.col-10 > div > div.owl-nav {
            display: none;
        }

        #prev-gallery > div > img {
            margin-right: 50px !important;
        }

        #next-gallery > div > img {
            margin-left: 50px !important;
        }

        body > section.check_out > div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #visit_website {
            font-size: 30px;
            width: 100%;
            padding: 10px;
        }

        body > section.coach_data > div > div > div:nth-child(2) {
            margin-top: 50px !important;
        }

        .right_table h2 {
            font-size: 17px;
        }

        .left_table h2 {
            font-size: 18px;
        }

        .icons_coach {
            padding-top: 20px;
            padding-bottom: 10px;
            text-align: center;
        }
    }

    /* Lightbox */
    #lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: none;
    }

    #lightbox .lightbox-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 800px;
        height: auto;
        background: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    #lightbox .lightbox-content .lightbox-image {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    #lightbox .lightbox-content .lightbox-image img {
        width: 60%;
        height: auto;
    }

    #lightbox .lightbox-content .lightbox-text {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    #lightbox .lightbox-content .lightbox-text h4 {
        font-size: 24px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        line-height: 26px;
        text-transform: uppercase;
        color: #000;
        text-align: center;
        margin-bottom: 10px;
    }

    #lightbox .lightbox-content .lightbox-text p {
        font-size: 18px;
        font-family: 'Raleway';
        font-weight: 600;
        color: #000;
        line-height: 21px;
        padding-top: 17px;
        border-bottom-color: #898989;
        text-align: center;
    }

    #lightbox .lightbox-content .lightbox-text p.date {
        font-size: 18px;
        font-family: 'Raleway';
        font-weight: 600;
        color: #000;
        line-height: 21px;
        padding-top: 17px;
        border-bottom-color: #898989;
        text-align: center;
    }

    #lightbox .lightbox-content .lightbox-text p.date a {
        color: #000;
    }

    #lightbox .lightbox-content .lightbox-text p.date a:hover {
        color: #000;
    }

    #lightbox .lightbox-content .lightbox-text p.date a:visited {
        color: #000;
    }

    #lightbox .lightbox-content .lightbox-text p.date a:active {
        color: #000;
    }

    .close-lightbox {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 30px;
        height: 30px;
        color: #fff;
        cursor: pointer;
    }

    .close-lightbox:hover {
        color: #000;
    }

    .arrows {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 60px;

    }

    .arrow {
        width: 30px;
        height: 30px;
        background: #fff;
        color: #2DC810;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .newman:hover {
        cursor: pointer;
    }

    .coach_content p {
        padding-top: 40px;
    }

    h4.coach_slider {
        text-align: center !important;
    }

    .masonry_gallery img { 
        max-width: 100%;
        display: block;
        margin-bottom: .5em; 
    }

    .masonry_gallery img:hover {
        transform: scale(1.02);
        /* Transform scale in safari */
        /* -webkit-transform: scale(1.003); */
        /* Transform scale in chrome */
        /* -moz-transform: scale(1.02); */
        /* Transform scale in firefox */
        /* -o-transform: scale(1.02); */
        /* Transform scale in opera */
        /* -ms-transform: scale(1.02); */
        transition: all 0.3 ease-in-out;

    }

    
    .masonry_gallery {
        columns: 5 320px;
        column-gap: .5em;
        margin-bottom: 50px;
    }

    @media only screen and (max-width: 600px) {
        .masonry_gallery img {
            width: 100%;
            height: auto;
        }
    }

    @media only screen and (max-width: 600px) {
        .masonry_gallery {
            columns: 1;
        }
    }

    .table_bg {
        width: 80% !important;
    }

    .left_table, .right_table {
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
        align-items: center; 
        margin-top: 60px;
    }

    .academic_btn {
        display: flex;
        gap: 50px;
        justify-content: center;
        align-items: center;
    }

    .coach_bg {
        background-position: top !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

</style>
    @if($coach->bio == null)
    <style>
        .coach_content {
            margin-top: 150px;
            padding-top: 0px;
            padding-bottom: 1px;
            min-height: 130vh;
        }

    @media only screen and (max-width: 757px) {
        .coach_content {
            margin-top: 150px;
            min-height: 80vh;
        }

        .coach_content h1 {
            font-size: 80px;
            font-weight: 700;
            font-family: 'work-sans', sans-serif;
            line-height: 40px;
            margin-bottom: 30px;
        }

        .icons_coach a i {
            font-size: 40px !important;
        }
    }
    </style>
    @endif
<link rel="stylesheet" href="{{ asset('vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })

        $('#carousel_blog').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    })
</script>
<script>
    // WordPress API - Get articles
    const content_articles = document.getElementById('content_articles');
    const url_magazine = 'https://wp.quarterbackmagazine.com/wp-json/wp/v2/posts?per_page=4';

    // Fetch to get the data from the API
    fetch(url_magazine)
        .then(response => response.json())
        .then(data => {
            var html_post = '';
            data.forEach(post => {
                var image_url = '';
                const data_image = post;
                const title = post.title.rendered;
                // Dar formato a la fecha mes, dia, año
                const date = new Date(post.date);
				const day = date.getDate();
				const month = date.getMonth();
				const year = date.getFullYear();
				const month_name = date.toLocaleString('en-US', { month: 'long' });
				const date_format = month_name + ' ' + day + ', ' + year;
                const link = post.link;
                const link_media_to_fetch = post._links['wp:featuredmedia'][0].href;
                // Fetch to get image from the API
                fetch(link_media_to_fetch)
                    .then(response => response.json())
                    .then(data => {
                        image_url = data.source_url;
                        html_post += `
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 newman" onclick="window.location.href='${link}'">
                                    <div class="player_bg_one_down" style="background-image: url('${image_url}');">
                                        <div class="content_upp ">
                                            <a href="${link}" class="appointment-bttn scrollto"><span
                                                    class="d-none d-md-inline">News</span></a>
                                            <h4>${title}</h4>
                                            <p class="date">${date_format}</p>
                                        </div>
                                    </div>
                                </div>
                        `;
                        //Insertar el articulo en content_articles
                        content_articles.innerHTML = html_post;
                    });
            });
        });

</script>
<script>
        $('.masonry_gallery img').click(function(){
            var image_url = $(this).attr('src');
            console.log(image_url);
            //Open lightbox
            $('#lightbox').fadeIn(300);
            $('.lightbox-image').html(`
                <img src="${image_url}" alt="">
            `);
        });
</script>
<script>
   /*  $('.owl-carousel').on('click', '.owl-item', function() {
        var image_url = $(this).find('img').attr('src');
        console.log(image_url);
        //Open lightbox
        $('#lightbox').fadeIn(300);
        $('.lightbox-image').html(`
            <img src="${image_url}" alt="">
        `);
    }); */

    // Close lightbox
    $('#lightbox').on('click', '.close-lightbox', function() {
        $('#lightbox').fadeOut(300);
    });

    const arrow_left = document.getElementsByClassName('arrow-left');
    const arrow_right = document.getElementsByClassName('arrow-right');
    console.log(arrow_left);

    function saveMasonryPhotos () {
        var masonry_photos = [];
        $('.masonry_gallery img').each(function() {
            masonry_photos.push($(this).attr('src'));
        });

        return masonry_photos;
    }

    arrow_left[0].addEventListener('click', () => {
        var image_url = $('.lightbox-image img').attr('src');
        let photos = saveMasonryPhotos();
        //Buscamos en las photos la image_url y obtenemos el elemento anterior
        let index = photos.indexOf(image_url);
        if (index > 0) {
            let previous_image = photos[index - 1];
            $('.lightbox-image img').attr('src', previous_image);
        }
        /* $('.owl-carousel').trigger('prev.owl.carousel');
        var new_image_url = $('.owl-item.active').find('img').attr('src');
        if (new_image_url == image_url) {
            $('.owl-carousel').trigger('prev.owl.carousel');
            $('.lightbox-image img').attr('src', $('.owl-item.active').find('img').attr('src'));
        }
        $('.lightbox-image img').attr('src', $('.owl-item.active').find('img').attr('src')); */
        
    });
    
    arrow_right[0].addEventListener('click', () => {
        var image_url = $('.lightbox-image img').attr('src');
        let photos = saveMasonryPhotos();
        //Buscamos en las photos la image_url y obtenemos el elemento siguiente
        let index = photos.indexOf(image_url);
        if (index < photos.length - 1) {
            let next_image = photos[index + 1];
            $('.lightbox-image img').attr('src', next_image);
        }
        /* $('.owl-carousel').trigger('next.owl.carousel');
        var new_image_url = $('.owl-item.active').find('img').attr('src');
        if (new_image_url == image_url) {
            $('.owl-carousel').trigger('next.owl.carousel');
            $('.lightbox-image img').attr('src', $('.owl-item.active').find('img').attr('src'));
        }
        $('.lightbox-image img').attr('src', $('.owl-item.active').find('img').attr('src')); */
    });
</script>
<script>
    //Cambia el scale de als fotos si estamos en safari
    var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    const masonry_gallery = document.getElementsByClassName('masonry_gallery');
    if (isSafari) {
        var masonry_gallery_children = masonry_gallery[0].childElementCount;
        masonry_gallery[0].addEventListener('mouseover', function(e) {
            if (e.target.tagName == 'IMG') {
                e.target.style.transform = 'scale(1.003)';
                e.target.addEventListener('mouseout', function(e) {
                    e.target.style.transform = 'scale(1)';
                });
            }
        });
        
    }
</script>
@stop