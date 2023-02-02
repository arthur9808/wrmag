<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    
	<title>@yield('title')</title>

	<!-- Favicons -->
	<link href="{{ asset('template/assets/img/favicon.png') }}" rel="icon">
	<link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">
	
	<link
		href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="{{ asset('template/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('template/assets/css/responsive.css') }}" rel="stylesheet">
	
	@yield('css')
	<style>
		/*Todos los elementos que tengan Open Sans serán cambiados por Work Sans*/
		* {
			font-family: 'Raleway', sans-serif;
		}

		.iconss a {
			margin: 0px 5px;
		}

		.social-links a, .iconss a i {
			font-size: 25px;
			color: #fff;
		}

		#topbar .social-links a {
			color: #fff !important;
		}

		.appointment-btn {
			margin-left: 20px;
			font-size: 20px;

		}

		#sign_up_nav {
			margin-left: 50px !important;
		}

		


		@media only screen and (max-width: 600px) {
			#sign_up_nav {
				font-size: 10px !important;
			}

			#sign_up_nav {
				padding: 5px !important;
			}

			.mobile-nav-toggle {
				margin-right: 10px !important;
			}
			nav#navbar {
				display: block;
			}

			.navbarr ul {
				display: flex;
				flex-direction: column;
				align-items: center;
			}

			body > footer.footer_top > div > div:nth-child(1) > div:nth-child(1) {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}

			body > footer.footer_top > div > div:nth-child(1) > div:nth-child(3) {
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.justify-content-between {
				justify-content: center !important;
			}

			#header .logo img {
				max-height: 60px !important;
			}

			#header {
				padding: 5px 0 !important;
			}

			#header > div {
				padding-left: 0 !important;
			}

			#sign_up_nav {
				padding: 5px !important;
				width: 105px;
			}

			#footer_bootom {
				/* margin-bottom: 60px; */
			}

			/* #sign_up_nav {
				display: none !important;
			} */

			#header > div > #navbar	 {
				margin-left: 0px !important;
			}

			#header > div > h1 {
				margin-right: 120px !important;
				margin-left: 20px !important;
			}

			#sign_up_nav {
				margin-left: 0px !important;
				margin-right: -45px !important;
			}

			#header > nav > div > a > img {
				max-width:90px !important;
			}

			.social-links a, .iconss a i {
				font-size: 20px;
				color: #fff;
			}

			.iconss > a > i {
				font-size: 30px !important;
			}
		}

	.navbar {
		background: #fff !important;
	}

	#sign_up_nav > span {
		color: #fff;
	}

	.navbar li {
		margin: 5px !important;
	}

	@media (min-width: 768px) and (max-width: 1024px) {
		.navbar ul {
			display: flex !important;
		}

	}

	@media (min-width: 992px) {
		#header > .navbar {
			display: none !important;
		}

	}

	@media (min-width: 10px) and (max-width: 990px) {
		#header > div {
			display: none !important;
		}

		#header > .navbar {
			display: flex !important;
		}

		#header > nav > div > a > img {
			max-width: 80px !important;
		}
	}

	/* Media Pantalla */
	@media (max-width: 991px) and (min-width: 768px) {

		#header > nav {
			display: flex;
		}

		#header > nav > div > a.navbar-brand > img {
			max-width: 120px !important;
			margin-left: 10px !important;
		}

		#sign_up_nav {
			margin-left: 350px !important;
		}

		.navbar a, .navbar a:focus {
			display: flex;
			align-items: center;
			justify-content: space-between;
			font-size: 15px;
			font-weight: 600 !important;
			padding: 8px 5px;
		}
	}

	

	/* Media Query Only iPad Air */
	@media (max-width: 991px) and (min-width: 768px) {
		#header > div > #navbar	 {
			margin-left: 0px !important;
		}

		#header > div > h1 {
			margin-right: 260px !important;
			margin-left: 20px !important;
		}
	}


	@media (max-width: 767px) {
		.navbar {
			padding: 5px !important;
		}

		/* .bi-list::before {
			content: "\f479";
			margin-left: 200px !important;
		} */
	}

		/* Media Query mayor a 1025 y menos a 1200 */
	@media only screen and (min-width: 1025px) and (max-width: 1200px) {

		/* El menu de hamburguesa se muestra y se oculta el nav */
		#navbar {
			display: none;
		}

		.navbarr ul {
			display: flex;
			flex-direction: column;
			align-items: self-start;
		}

		.justify-content-between {
			justify-content: center !important;
		}

		#sign_up_nav {
			font-size: 12px;
		}
		#navbar > ul > li > a{
			font-size: 12px;
		}

		#header .logo img {
			max-height: 60px;
		}

		.me-auto {
			/* margin-right: auto!important; */
			margin-right: 10px !important;
		}

		.appointment-btn {
			margin-left: 20px;
			font-size: 20px;
		}
	}

	#header .logo img {
		max-height: 85px;
	}

	.me-auto {
		/* margin-right: auto!important; */
		margin-right: 20px !important;
	}

	</style>

	<style>
		.menu_bar {
			position: fixed;
			bottom: 0;
			z-index: 9999;
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			width: 100%;
			height: 60px;
			background-color: #fff;
			border-top: 1px solid #e5e5e5;
			overflow: hidden;
		}

		.menu_bar li {
			display: inline-block;
			margin: 0;
			padding: 0;
			list-style: none;
			font-size: 14px;
			font-weight: 600;
			color: #000;
			text-transform: uppercase;
			text-decoration: none;
			cursor: pointer;
			transition: all 0.3s ease-in-out;

		}

		.menu_bar li a {
			color: #000;
			font-weight: 900;
			letter-spacing: 1px;
			text-decoration: none;
			font-size: 12px;
		}

		.menu_bar li a > i {
			font-size: 18px;
		}
		
		.menu_bar li a:hover {
			color: #000;
			text-decoration: none;
			background: #fff;
		}

		.menu_bar li a:focus {
			color: #000;
			text-decoration: none;
			background: #fff;
		}

		.menu_bar li a:active {
			color: #000;
			text-decoration: none;
			background: #000;
		}

		.menu_bar li:hover {
			background-color: #000;
			color: #fff;
		}

		/*¨Hacemos las separaciones entre los items del menu*/
		.menu_bar ul {
			width: 100%;
		}
		.menu_bar ul li {
			padding: 17px 17px;
			border-left: 1px solid #e5e5e5;
			border-right: 1px solid #e5e5e5;
			width: calc(100% / 4);
			/* width: calc(100% - (100% - 100%)); */
			padding-top: 35px !important;

			
		}

		/* .menu_bar ol, ul {
			padding-left: 0rem;
			padding-right: 0rem;
			display: flex;
			flex-direction: initial;
			justify-content: center;
			align-items: center;
			text-align: center;
		} */

		body > div.d-block.d-sm-none > div > ul {
			padding-left: 0rem;
			padding-right: 0rem;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			text-align: center;
		}

		#navbarSupportedContent > ul > li:nth-child(3) > a, #navbarSupportedContent > ul > li:nth-child(5) > a {
			font-weight: bold !important;
			color: #ff0000 !important;
		}

		#navbar > ul > li:nth-child(3) > a, #navbar > ul > li:nth-child(5) > a {
			font-weight: bold;
			color: #ff0000;
		}

		.foot > ul > li > a {
			color: #fff !important;
		}

		.navbar-light .navbar-toggler {
			border: 3px solid #575757 !important; 
		}

		.navbar-toggler-icon {
			width: 1.8em !important;
			height: 1.8em !important;
		}


	</style>
</head>

<body>

	<!-- ======= Top Bar ======= -->
	<div id="topbar" class="d-flex align-items-center fixed-top">
		<div class="container d-flex justify-content-between">
			<div class="contact-info d-flex align-items-center">
				<!--- <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com"></a>
        <i class="bi bi-phone"></i> --->
			</div>
			<div class="d-lg-flex social-links align-items-center">
				{{-- <a  class="instagram"><img src="{{ asset('template/assets/img/logo-final-04.png') }}" alt=""></a>
				<a class="twitter"><img src="{{ asset('template/assets/img/twitterr.png') }}" alt=""></a>
				<a  class="tiktok"><img src="{{ asset('template/assets/img/logo-final-06.png') }}" alt=""></a>
				<a class="youtube"><img src="{{ asset('template/assets/img/utube.png') }}" alt=""></a> --}}

				{{-- <a class="instagram"><img src="{{ asset('template/assets/img/social-media/logo-final-04.svg') }}" alt=""></a>
				<a class="twitter"><img src="{{ asset('template/assets/img/social-media/logo-final-03.svg') }}" alt=""></a>
				<a class="tiktok"><img src="{{ asset('template/assets/img/social-media/logo-final-06.svg') }}" alt=""></a>
				<a class="youtube"><img src="{{ asset('template/assets/img/social-media/logo-final-07.svg') }}" alt=""></a> --}}

				<a class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
				<a class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
				<a class="tiktok" target="_blank"><i class="fab fa-tiktok"></i></a>
				<a class="youtube" target="_blank"><i class="fab fa-youtube"></i></a>
				<a class="facebook" target="_blank"><i class="fab fa-facebook"></i></a>
			</div>
		</div>
	</div>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="{{ url('/') }}"><img src="{{ asset('template/assets/img/3QB-Magazine-logo.png') }}" alt=""></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto" href="{{ url('/') }}" id="nav_home">HOME</a></li>
					@if (auth()->user() && session('profile_id'))
					<li><a class="nav-link scrollto" href="{{ url('log-out-admin') }}">ADMIN PANEL</a></li>
					@elseif (session('profile_id'))
					<li><a class="nav-link scrollto" href="{{ url('redirect-profile') }}">YOUR PROFILE</a></li>
					@else
					<li><a class="nav-link scrollto" href="{{ url('sign-in') }}">LOGIN</a></li>
					@endif	
					<li><a class="nav-link scrollto" href="{{ url('profiles') }}">PROFILES</a></li>
					<li><a class="nav-link scrollto" href="https://wp.quarterbackmagazine.com">MAGAZINE</a></li>
					<li><a class="nav-link scrollto" href="{{ url('memberships') }}">MEMBERSHIPS</a></li>
					<li><a class="nav-link scrollto" href="{{ url('coaches') }}">COACHES</a></li>
					<li><a class="nav-link scrollto" href="{{ url('faqs') }}">FAQS</a></li>
					<li><a class="nav-link scrollto" href="{{ url('contactus') }}">CONTACT</a></li>
				</ul>
				{{-- <i class="bi bi-list mobile-nav-toggle"></i> --}}
			</nav><!-- .navbar -->

			{{-- <a href="#signup" class="appointment-btn scrollto"><span class="d-none d-md-inline">FREE SIGN UP</span></a> --}}
			@if (auth()->user() && session('profile_id'))
			<a href="{{ url('log-out-admin') }}" id="sign_up_nav" class="appointment-btn scrollto" style="display: flex; flex-direction:row; justify-content: center; align-items: center;"><span class="d-none d-md-inline">LOG OUT ADMIN</span></a>
			@elseif (session('profile_id'))
			<a href="{{ url('log-out') }}" id="sign_up_nav" class="appointment-btn scrollto" style="display: flex; flex-direction:row; justify-content: center; align-items: center;"><span class="d-none d-md-inline">LOG OUT</span></a>
			@else
			<a href="{{ url('sign-up') }}" id="sign_up_nav" class="appointment-btn scrollto" style="display: flex; flex-direction:row; justify-content: center; align-items: center;"><span class="d-none d-md-inline"> FREE SIGN UP</span></a>
			@endif

		</div>

		<!-- Mobile Nav -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('template/assets/img/3QB-Magazine-logo.png') }}" alt=""></a>
				@if (auth()->user() && session('profile_id'))
				<a href="{{ url('log-out-admin') }}" id="sign_up_nav" class="appointment-btn scrollto" style="display: flex; flex-direction:row; justify-content: center; align-items: center;"><span class="d-none d-md-inline">LOG OUT ADMIN</span></a>
				@elseif (session('profile_id'))
				<a href="{{ url('log-out') }}" id="sign_up_nav" class="appointment-btn scrollto" style="display: flex; flex-direction:row; justify-content: center; align-items: center;"><span class="d-none d-md-inline">LOG OUT</span></a>
				@else
				<a href="{{ url('sign-up') }}" id="sign_up_nav" class="appointment-btn scrollto" style="display: flex; flex-direction:row; justify-content: center; align-items: center;"><span class="d-none d-md-inline"> FREE SIGN UP</span></a>
				@endif
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="{{ url('/') }}" id="nav_home_mobile">HOME</a>
						</li>
						@if (auth()->user() && session('profile_id'))
						<li class="nav-item">
							<a class="nav-link" href="{{ url('log-out-admin') }}">ADMIN PANEL</a>
						</li>
						@elseif (session('profile_id'))
						<li class="nav-item">
							<a class="nav-link" href="{{ url('redirect-profile') }}">YOUR PROFILE</a>
						</li>
						@else
						<li class="nav-item">
							<a class="nav-link" href="{{ url('sign-in') }}">LOGIN</a>
						</li>
						@endif	
						<li class="nav-item">
							<a class="nav-link" href="{{ url('profiles') }}">PROFILES</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://wp.quarterbackmagazine.com">MAGAZINE</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('memberships') }}">MEMBERSHIPS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('coaches') }}">COACHES</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('faqs') }}">FAQS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('contactus') }}">CONTACT</a>
						</li>
					</ul>
					
				</div>
			</div>
		</nav>
		<!-- End Mobile Nav -->


	</header><!-- End Header -->

        <!-- ======= Hero Section ======= -->

        @yield('content')

        <!-- ======= End Hero Section ======= -->

		<!-- Mobile menu -->
		{{-- <div class="d-block d-sm-none">
			<div class="menu_bar">
				<ul>
					<li><a href="{{ url('/') }}"> <i class="fas fa-home"></i><br> Home</a></li>
					<li><a href="{{ url('/sign-up') }}"> <i class="fas fa-sign-in-alt"></i><br> Sign Up</a></li>
					<li><a href="{{ url('/profiles') }}"> <i class="fas fa-users"></i><br> Profiles</a></li>
					<li><a href="{{ url('/contactus') }}"> <i class="fas fa-phone"></i><br> Contact</a></li>
				</ul>
			</div>
		</div> --}}
		<!-- End Mobile menu -->

        <!-- ======= Footer ======= -->
        <footer class="footer_top">
            <div class="container ">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 logo_social_media">
                        <img src="{{ asset('template/assets/img/logo-final-grey 2.png') }}" alt="">
                        <div class="iconss">
							<a class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
							<a class="tiktok" target="_blank"><i class="fab fa-tiktok"></i></a>
                            <a class="youtube" target="_blank"><i class="fab fa-youtube"></i></a>
							<a class="facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 col-lg-6 col-sm-12 col-xs-12">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12">
						@if(!session('profile_id'))
                        <button class="btn" type="button" id="sign_up_button">free sign up</button>
						@endif
					</div> --}}
                </div>
                <div class="row footer_menu">
                    <div class="black-bg">
                        <nav id="navbar" class="navbarr foot order-last order-lg-0">
                            <ul>
								<li><a class="nav-link scrollto" href="{{ url('privacy-policy') }}">Terms & Privacy</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('memberships') }}">Memberships</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('faqs') }}">FAQ</a></li>
								<li><a class="nav-link scrollto" href="{{ url('ada') }}">Accesibility</a></li>
                                <li><a class="nav-link scrollto" href="{{ url('contactus') }}">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>
        <footer id="footer_bootom">

            <div class="container  footer_text">
                <p>PRIVACY POLICY | ALL INFORMATION PROVIDED TO QUARTERBACK MAGAZINE IS PRIVATE AND CONFIDENTIAL.<br>
                    PERSONAL INFORMATION WILL NOT BE REDISTRIBUTED.<br>
                    © <script>document.write(new Date().getFullYear())</script> QUARTERBACK MAGAZINE. Designed and Developed by <span class="red">Suner and Garcia</span></p>
            </div>

        </footer>

        <!-- Vendor JS Files -->
        <script src="{{ asset('template/assets/vendor/purecounter/purecounter.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
        <!-- Template Main JS File -->
        <script src="{{ asset('template/assets/js/main.js') }}"></script>
		<!-- Main JS -->
		<script>
			//Detectar cuando se hace scroll con Javascript Vanilla
			const navbar_mobile = document.querySelector("#navbarSupportedContent");
			window.onscroll = function() {
				//Si esta abierto el menu mobile se cierra
				if(navbar_mobile.classList.contains("show")){
					navbar_mobile.classList.remove("show");
				}
			};

		</script>
		<script>
			// Social Media
			fetch('{{ url('get-social-media') }}')
			.then(response => response.json())
			.then(data => {
				//Get element by class name
				const insta = document.getElementsByClassName('instagram');
				const twitter = document.getElementsByClassName('twitter');
				const tiktok = document.getElementsByClassName('tiktok');
				const youtube = document.getElementsByClassName('youtube');
				const facebook = document.getElementsByClassName('facebook');
				
				// Header
				insta[0].href = data[0].value;
				twitter[0].href = data[1].value;
				tiktok[0].href = data[2].value;
				youtube[0].href = data[3].value;
				facebook[0].href = data[4].value;
				// Footer
				insta[1].href = data[0].value;
				twitter[1].href = data[1].value;
				tiktok[1].href = data[2].value;
				youtube[1].href = data[3].value;
				facebook[1].href = data[4].value;
			});
			console.log('fetched');


		</script>
		<script>
			const url = window.location.href;
			const url_array = url.split('/');
			const url_last = url_array[url_array.length - 1];
			const url_last_array = url_last.split('?');
			const url_last_last = url_last_array[0];
			const nav_home = document.getElementById('nav_home');
			const nav_home_mobile = document.getElementById('nav_home_mobile');
			const navbar = document.getElementById('navbar');
			const navbar_links = navbar.getElementsByTagName('a');
			for (let i = 0; i < navbar_links.length; i++) {
				const navbar_link = navbar_links[i];
				const navbar_link_url = navbar_link.getAttribute('href');
				const navbar_link_url_array = navbar_link_url.split('/');
				const navbar_link_url_last = navbar_link_url_array[navbar_link_url_array.length - 1];
				const navbar_link_url_last_array = navbar_link_url_last.split('?');
				const navbar_link_url_last_last = navbar_link_url_last_array[0];
				if (url_last_last == navbar_link_url_last_last) {
					navbar_link.classList.add('active');
				}
				if (url_last_last == '') {
					nav_home.classList.add('active');
					nav_home_mobile.classList.add('active');

				}
			}
		</script>

<script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "dFEe1JRBwk");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
		@yield('js')



    </body>

</html>