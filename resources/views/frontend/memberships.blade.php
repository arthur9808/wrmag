@extends('layouts.frontend')
@section('title', 'WRMag - Memberships')
@section('content')

    <section id="section_membership" class="membership">
        <div class="container">
            <h1 class="membershil_title">choose the best MEMBERSHIP for you</h1>
            <div class="row" id="memberships_content">

				@foreach ($memberships as $membership)
				<?php 
					$price = explode('.', $membership->price);
					$previus_price = explode('.', $membership->previous_price);
				?>
					@if(!$membership->popular)
						<!-- Not Popular with price -->
						<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 column_top price_list" id="{{ $membership->name }}">
							<div class="border_redd"></div>
							<div class="inner_contentss">
								<h5>{{ $membership->name }}</h5>
								<p class="alignment">{{ $membership->title }} </p>
								<div class="whole_div">
									@if($membership->price == '0.00')
									<div class="pp"><span></span>
										<span class="price">FREE</span>
										<span class="digits"><br>/mo</span>
									</div>
									@else
									<div class="strike_safari">
										<div class="pp"><span>$</span>
											<span class="price">{{ $previus_price[0] }}</span>
											<span class="digits">.{{ $previus_price[1] }} <br>/mo</span>
										</div>
									</div>
									@endif
								</div>
								<div class="listt">
									<div class="vector_list">
										<ul>
											<!-- Print benefits are is_shared -->
											@foreach($membership->benefits as $benefit)
												@if($benefit->is_shared)
													<li>
														<div><img src="{{ asset('template/assets/img/Vector-ticck.png') }}" alt=""></div>
														<div>{{ $benefit->name }}</div>
													</li>
												@endif
											@endforeach
											{{-- <hr class="benefits_hr"> --}}
											@foreach($membership->benefits as $benefit)
											@if(!$benefit->is_shared)
													<li>
														<div><img src="{{ asset('template/assets/img/Vector-ticck.png') }}" alt=""></div>
														<div>{{ $benefit->name }}</div>
													</li>
												@endif
											@endforeach
										</ul>
									</div>
								</div>
								<div class="bottom_section">
									@if($membership->price == '0.00')
										<h4>FREE</h4>
									@else
									<div class="pp_bottom"><span class="dollr">$</span>
										<span class="price">{{ $price[0] }}</span>
										<span class="digits">.{{ $price[1] }} <br><span class="dayss">/mo</span></span>
									</div>
									@endif
									@if(!$has_membership)
										
										@if (session('profile_id'))
											@if($membership->price == '0.00')
											<a href="{{ url('/complete-payment-logged-free/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Join for free</a>
											@else
											<a href="{{ url('/complete-payment-logged/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Upgrade Now</a>
											@endif
										@else
											@if($membership->price == '0.00')
											<a href="{{ url('/complete-payment-free/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Join for free</a>
											@else
											<a href="{{ url('/complete-payment/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Upgrade Now</a>
											@endif
										@endif
									@else
										@if($membership->price == '0.00')
										<a href="{{ url('/upgrade-membership/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Join for free</a>
										@elseif($membership->name != $membership_profile->name)
										<a href="{{ url('/upgrade-membership/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Upgrade Now</a>
										@else
										<a href="{{ url('/redirect-profile/') }}" id="go_profile" class="appointment-btn scrollto">Sign Up</a>
										@endif
									@endif
								</div>
							</div>
						</div>
						<!-- End Not Popular with price -->
					@else
						<!-- Popular with price -->
						<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12  price_list" style="border: 2px solid #2DC810" id="{{ $membership->name }}">
							<div class="most_popular">
								<h6>MOST POPULAR<h6>
							</div>
							<div class="inner_contentss">
								<h5>{{ $membership->name }}</h5>
								<p class="alignment">{{ $membership->title }} </p>
								<div class="whole_div">
									@if($membership->price == '0.00')
									<div class="pp"><span></span>
										<span class="price">FREE</span>
										<span class="digits"><br>/mo</span>
									</div>
									@else
									<div class="strike_safari">
										<div class="pp"><span>$</span>
											<span class="price">{{ $previus_price[0] }}</span>
											<span class="digits">.{{ $previus_price[1] }} <br>/mo</span>
										</div>
									</div>
									@endif
								</div>
								<div class="listt">
									<div class="vector_list">
										<ul>
											<!-- Print benefits are is_shared -->
											@foreach($membership->benefits as $benefit)
												@if($benefit->is_shared)
													<li>
														<div><img src="{{ asset('template/assets/img/Vector-ticck.png') }}" alt=""></div>
														<div>{{ $benefit->name }}</div>
													</li>
												@endif
											@endforeach
											{{-- <hr class="benefits_hr"> --}}
											@foreach($membership->benefits as $benefit)
												@if(!$benefit->is_shared)
													<li>
														<div><img src="{{ asset('template/assets/img/Vector-ticck.png') }}" alt=""></div>
														<div>{{ $benefit->name }}</div>
													</li>
												@endif
											@endforeach
										</ul>
									</div>
								</div>
								<div class="bottom_section">
									@if($membership->price == '0.00')
										<h4>FREE</h4>
									@else
									<div class="pp_bottom"><span class="dollr">$</span>
										<span class="price">{{ $price[0] }}</span>
										<span class="digits">.{{ $price[1] }} <br><span class="dayss">/mo</span></span>
									</div>
									@endif
									@if(!$has_membership)
										
										@if (session('profile_id'))
											@if($membership->price == '0.00')
											<a href="{{ url('/complete-payment-logged-free/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Join for free</a>
											@else
											<a href="{{ url('/complete-payment-logged/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Upgrade Now</a>
											@endif
										@else
											@if($membership->price == '0.00')
											<a href="{{ url('/complete-payment-free/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto"> Join for free</a>
											@else
											<a href="{{ url('/complete-payment/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Upgrade Now</a>
											@endif
										@endif
									@else
										@if($membership->price == '0.00')
										<a href="{{ url('/upgrade-membership/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Join for free</a>
										@elseif($membership->name != $membership_profile->name)
										<a href="{{ url('/upgrade-membership/'.$membership->id) }}" id="buy_membership_button" class="appointment-btn scrollto">Upgrade Now</a>
										@else
										<a href="{{ url('/redirect-profile/') }}" id="go_profile" class="appointment-btn scrollto">Upgrade Now</a>
										@endif
									@endif
								</div>
							</div>
						</div>
						<!-- End Popular with price -->
					@endif
				@endforeach
            </div>
        </div>
    </section>
    <!-- ===== End membership --->
@endsection

@section('css')
<style>
	@media only screen and (max-width: 600px) {

		
		#buy_membership_button {
			font-size: 20px;
		}

		#section_membership > div > div > div:nth-child(3) > div.inner_contentss > div.listt > div > ul > li {
			/* Si el contenido del li brinca a otra linea, se debe ajustar al li */
			margin-bottom: 10px;
		}

		.strike_safari::after {
    		margin-left: 110px !important;
		}

		h1.membershil_title {
			font-size: 25px;
		}
	}

	.hide_price {
		visibility: hidden;
	} 

	.vector_list ul li {
		display: flex;
		flex-direction: row;
	}

	.bottom_section {
		text-align: center;
		border-top: 2px solid #ececec;
		padding-top: 5px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	.bottom_section .pp_bottom {
		display: flex;
		text-align: center;
		justify-content: center;
		align-items: center;
		padding-left: 0px;
	}

	.appointment-btn {
		margin-left: 0px;
		background: linear-gradient(180deg, #2DC810 0%, #9A0D0D 99.99%, rgba(255, 0, 0, 0) 100%, #AE1010 100%);
		color: #fff;
		padding: 8px 25px;
		white-space: nowrap;
		transition: 0.3s;
		font-size: 23px;
		font-weight: 600;
		line-height: 28px;
		display: inline-block;
	}

	.appointment-btn {
		margin-left: 0px !important;
		font-size: 20px;
		width: 100%;
	}

	.strike_safari::after {
		content: '';
		position: absolute;
		width: 90px;
		height: 3px;
		background-color: #2DC810;
		z-index: 999;
		margin-top: -20px;
		margin-left: 70px;
    	transform: rotate(-20deg);
	}

	.membershil_title {
		margin-bottom: 70px !important;
	}


	/* Media query max 767px */
	@media only screen and (max-width: 767px) {

		.bottom_section .pp_bottom {
			padding-left: 0px !important;
		}

		.appointment-btn {
			margin-left: 10px !important;
		}

		
	}

	@media (min-width: 1200px) and (max-width: 1499px) {
		.listt {
			height: 1165px !important;
		}
	}

	/* .listt {
		height: 975px !important;
	} */
	.benefits_hr {
		margin: 30px 0px;
	}

	/* Color Memberships */
	#BEGINNER > .border_redd {
		height: 8px;
		background: #000 !important;
		background: linear-gradient(110.35deg, #000 36.47%, #1d1d1d 77.55%) !important;
	}

	#BEGINNER {
		border: 2px solid #000 !important;
	}

	#PRACTICE\ SQUAD > .border_redd {
		height: 8px;
		background: #248b22 !important;
		background: linear-gradient(110.35deg, #248b22 36.47%, #1a5e19 77.55%) !important;
	}

	#PRACTICE\ SQUAD {
		border: 2px solid #248b22 !important;
	}

	#STARTER > .border_redd {
		height: 8px;
		background: #ec1e24 !important;
		
	}

	#ALL-PRO > .border_redd {
		height: 8px;
		background: #3fa0ef !important;
		background: linear-gradient(110.35deg, #3fa0ef 36.47%, #317fbe 77.55%) !important;
	}

	#ALL-PRO > div.inner_contentss > div.whole_div > div::after {
		background: linear-gradient(110.35deg, #3fa0ef 36.47%, #317fbe 77.55%) !important;
	}

	#PRACTICE\ SQUAD > div.inner_contentss > div.whole_div > div::after {
		background: linear-gradient(110.35deg, #248b22 36.47%, #1a5e19 77.55%) !important;
	}

	#STARTER > div.inner_contentss > div.whole_div > div::after {
		background: linear-gradient(110.35deg, #ec1e24 36.47%, #b71a1f 77.55%) !important;
	}

	#ALL-PRO {
		border: 2px solid #3fa0ef !important;
	}

	
</style>
@stop

@section('js')
<script>
	
</script>
@stop

