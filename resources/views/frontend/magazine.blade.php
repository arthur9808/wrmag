@extends('layouts.frontend')
@section('title', 'The Magazine')
@section('content')
<!-- ===== QUARTERBACK PROFILES --->

<section id="section_red" class="section_magazine">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h3>THE MAGAZINE</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 trending">
                <h6>TRENDING NOW</h6>
            </div>
        </div>

        <div class="row blogs" id="magazines">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 card-article">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design-2_1.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red">READ MORE</button> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 card-article">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design_4.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red">READ MORE</button> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 card-article">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design_5.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red">READ MORE</button> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 card-article">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/american-football-recruitment-platform_0001_1.jpg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red">READ MORE</button> </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row blogs">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design-2_2.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red" type="button">READ MORE</button> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design-2_2.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red" type="button">READ MORE</button> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design-2_2.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red" type="button">READ MORE</button> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12">
                <div class="articless">
                    <img src="{{ asset('template/assets/img/Untitled_design-2_2.jpeg') }}" alt="">
                    <div class="articles_con">
                        <h5>Holbrook Holds It Down </h5>
                        <p>A short description of the article here</p>
                        <div class="artile_mag"> <button class="bttn_red" type="button">READ MORE</button> </div>

                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row end_btn">
            <div class="col-12">

                <button class="appointment-bttn scrollto center">VIEW MORE ARTICLES</button>
            </div>
        </div>

    </div>



</section>



<!-- ===== end QUARTERBACK PROFILES --->



<!-- ===== market your recruitment?--->
<!--
<section id="section_seven" class="section_seven_bg">
    <div class="">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 ">
                <img src="{{ asset('assets/img/2player.jpeg') }}" alt="">
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12  middle_con">
                <h4> WANT TO</h4>
                <h1>market your <br><span class="colr">recruitment?</span></h1>
                <div class="check">
                    <button class="appointment-bttn scrollto center type=" button">Check it out</button>
                </div>
                <p class="justify-content-center">SIGN UP FOR A FREE PROFILE, OR CHOOSE ONE OF OUR MEMBERSHIPS TO
                    START YOUR RECRUITING BUSINESS TODAY.<br><br>

                    THIS IS AN INVESTMENT IN YOUR FUTURE ATHLETIC SUCCESS AND WE’RE
                    EXCITED TO BE WORKING WITH YOU ON YOUR JOURNEY.</p>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12  football_img">
                <img src="{{ asset('template/assets/img/3player.jpeg') }}" alt="">
            </div>
        </div>
    </div>
</section>
-->

<!-- ===== market your recruitment?--->


@endsection

@section('css')
<style>
    /* Add strock with #CBCBCB color */
	.articles_con::before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: #CBCBCB;
		z-index: -1;
		transform: skewX(-20deg);
		transform-origin: 0% 0%;
	}

    .articles_con {
        min-height: 250px !important;
        /* background: red; */
    }

    .card-article {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    @media only screen and (max-width: 600px) {
        /* *{
            overflow-x: hidden;
        } */
    }
</style>
@stop

@section('js')
<script>
    //Redirect to Magazine - WordPress
    const view_more_articles = document.querySelector("#section_red > div > div.row.end_btn > div > button");
    view_more_articles.addEventListener('click', function(){
        window.open('https://wp.quarterbackmagazine.com/', '_blank');
    });

    
    const url_magazine = 'https://wp.quarterbackmagazine.com/wp-json/wp/v2/posts?per_page=8';

    // Fetch to get the data from the API
    fetch(url_magazine)
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            var html_post = '';
            data.forEach(post => {
                var image_url = '';
                const data_image = post;
                const title = post.title.rendered;
                const short_content = wp_trim_words(post.excerpt.rendered, 15);
                const link = post.link;
                const link_media_to_fetch = post._links['wp:featuredmedia'][0].href;
                // Fetch to get image from the API
                fetch(link_media_to_fetch)
                    .then(response => response.json())
                    .then(data => {
                        image_url = data.source_url;
                        html_post += `
                            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 card-article">
                                <div class="articless">
                                    <img src="${image_url}" alt="">
                                    <div class="articles_con">
                                        <h5>${post.title.rendered}</h5>
                                        <p>${short_content}</p>
                                        <div class="artile_mag"> <button onclick="redirectArticle()" class="bttn_red" data-article="${link}">READ MORE</button> </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        document.getElementById('magazines').innerHTML = html_post;
                    });
            });
        });


        function wp_trim_words(text, num_words) {
            var words = text.split(/\s+/);
            if (words.length < num_words) {
                return text;
            }
            return words.slice(0, num_words).join(' ') + '...';
        }

        function redirectArticle() {
            let article = event.target.dataset.article;
            window.open(article, '_blank');
        }
</script>
@stop