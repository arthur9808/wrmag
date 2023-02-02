@extends('layouts.frontend')
@section('title', 'WRMag - Academic Profile')
@section('content')

	<section id="media_section" class="about_media">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12 left_proiless">
					<div class="img_box" onclick="window.location.href='{{ url('profile-about/'.$profile->slug) }}'">
						<a href="{{ url('profile-about/'.$profile->slug) }}"> <img src="{{ asset('template/assets/img/player 3.png') }}" alt=""></a>
						<p>About</p>
						@if($section_locked) 
						<br>
						@endif
					</div>
					<div class="img_box_last" onclick="window.location.href='{{ url('profile-performance/'.$profile->slug) }}'">
						<a href="{{ url('profile-performance/'.$profile->slug) }}"><img src="{{ asset('template/assets/img/performance.png') }}" alt=""></a>
						<p>
							Performance
							{{-- @if($section_locked) 
							<!-- UPGRADE BADGE -->
							<br>
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
							@endif --}}
						</p>
						@if($section_locked) 
							<br>
						@endif
					</div>
					<div class="img_box" onclick="window.location.href='{{ url('profile-academic/'.$profile->slug) }}'">
						<a href="{{ url('profile-academic/'.$profile->slug) }}"><img src="{{ asset('template/assets/img/Graduation Cap 1.png') }}" alt=""></a>
						<p>
							Academic
							{{-- @if($section_locked) 
							<!-- UPGRADE BADGE -->
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
							@endif --}}
						</p>
						@if($section_locked) 
							<br>
						@endif
					</div>
					<div class="img_box" onclick="window.location.href='{{ url('profile-media/'.$profile->slug) }}'">
						<a href="{{ url('profile-media/'.$profile->slug) }}"> <img src="{{ asset('template/assets/img/Artboard 1 1 (1).png') }}" alt=""></a>
						<p>
							Media
							@if($section_locked) 
							<!-- UPGRADE BADGE -->
							<br>
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
							@endif
						</p>
					</div>
					<!-- NEW LEFT MENU -->
					@if($profile->membership->name == 'BEGINNER' || $profile->membership->name == 'PRACTICE SQUAD')
					<div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
						<a href="{{ url('memberships') }}"> <img
								src="{{ asset('template/assets/img/IGiconos.png') }}" alt=""></a>
						<p class="menu_blocked">
							Instagram Exposure
							<br>
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
						</p>
					</div>
					@endif
					@if($profile->membership->name == 'BEGINNER')
					<div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
						<a href="{{ url('memberships') }}"> <img
								src="{{ asset('template/assets/img/MAGAZINE-iconos.png') }}" alt=""></a>
						<p class="menu_blocked_magazine">
							Featured in Digital Magazine
							<br>
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
						</p>
					</div>
					<div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
						<a href="{{ url('memberships') }}"> <img
								src="{{ asset('template/assets/img/TWiconos.png') }}" alt=""></a>
						<p class="menu_blocked">
							Twitter Exposure
							<br>
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
						</p>
					</div>
					@endif
					@if($profile->membership->name == 'BEGINNER' || $profile->membership->name == 'PRACTICE SQUAD')
					<div class="img_box" onclick="window.location.href='{{ url('memberships') }}'">
						<a href="{{ url('memberships') }}"> <img
								src="{{ asset('template/assets/img/SHOPiconos.png') }}" alt=""></a>
						<p class="menu_blocked">
							Exclusive Merch
							<br>
							<span class="badge badge-danger badge-red"> 
								<i class="fas fa-lock"></i>
								UPGRADE
							</span>
						</p>
					</div>
					@endif
					<!-- END NEW LEFT MENU -->
				</div>
				<div class="col-xl-10 col-lg-10 col-sm-12 col-xs-12 about_right">
					<div class="complete_profile">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 title_complete">
								<h3>Complete your QB Profile</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="squad_sec">
									<span class="squad">{{ $membership->name }} MEMBERSHIP</span>
									{{-- @if($membership->name != 'ALL-PRO')
									<a id="upgrade_btn" href="{{ url('/memberships') }}"  class="appointment-btn scrollto">UPGRADE</a>
									@endif --}}
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="help_message">
						<h4 class="featured_photos">Please e-mail <a class="issues_mail" href="mailto:catch@wrmag.com">catch@wrmag.com</a> for any issues</h3>
					</div>
					<div class="top_space">
						<h3 class="featured_photos">Performance Stats</h3>
					</div>
					<div class="row">
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
						<!-- End Alert to show messages -->
					</div>
					<form action="{{ url('/profile-performance') }}" method="POST" id="form_performance">
                        @csrf
						<!-- Input Hidden For Profile Id -->
						<input type="hidden" name="profile_id" value="{{ $profile->id }}">
						<div class="form-row fst_row">
							<div class="form-group inputtt labl-images col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="yarddash">40 Yard Dash</label><img src="{{ asset('template/assets/img/Artboard 2.png') }}"
									class="label_img1" alt="">
								<input type="text" class="form-control" id="yard_dash" name="forty_yard_dash" placeholder="Ex. 6’ 1”" value="{{ $performance->forty_yard_dash }}">
							</div>
							<div class="form-group inputtt labl-images col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="benchpress">Bench Press</label><img src="{{ asset('template/assets/img/Artboard 3.png') }}"
									class="label_img2" alt="">
								<input type="text" class="form-control" id="bench_press" name="brench_press" placeholder="Ex. 170 lbs" value="{{ $performance->brench_press }}">
							</div>
							<div class="form-group inputtt labl-images col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="number">Strength Squat</label><img src="{{ asset('template/assets/img/Artboard 4.png') }}"
									class="label_img3" alt="">
								<input type="number" class="form-control " id="squat_number" name="strength_squat" placeholder="Ex. 99" value="{{ $performance->strength_squat }}">
							</div>
							<div class="form-group inputtt labl-images col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="jumpnumber">Vertical Jump</label><img src="{{ asset('template/assets/img/Artboard 5.png') }}"
									class="label_img" alt="">
								<input type="number" class="form-control " id="jumb_number" name="vertical_jump" placeholder="Ex. 99" value="{{ $performance->vertical_jump }}">
							</div>

						</div>
						<div class="form-row fst_row second_row_imgs">
							<div class="form-group inputtt labl-images col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="broadjump">Broad Jump</label><img src="{{ asset('template/assets/img/Artboard 6.png') }}"
									class="label_imgg" alt="">
								<input type="text" class="form-control" id="jump_count" name="broad_jump" placeholder="Ex. 9 3/8" value="{{ $performance->broad_jump }}">
							</div>
							<div class="form-group inputtt labl-images col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="conedrill">Three-Cone Drill</label><img src="{{ asset('template/assets/img/Artboard 7.png') }}"
									class="label_imgg" alt="">
								<input type="text" class="form-control" id="cone_drill" name="three_cone_drill" placeholder="Ex. 74 1/2" value="{{ $performance->three_cone_drill }}">
							</div>
							<div class="form-group inputtt labl-images col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="shuttle">20-Yard Shuttle</label><img src="{{ asset('template/assets/img/Artboard 8.png') }}"
									class="label_imgg" alt="">
								<input type="number" class="form-control " id="yard_shuttle" name="twenty_yard_shuttle" placeholder="Ex. 11" value="{{ $performance->twenty_yard_shuttle }}">
							</div>
						</div>
						<hr>
						<div class="top_space">
							<h3 class="featured_photos">College Offers + Commits</h3>
						</div>
						{{-- <div class="form-row fst_row third_row">
							<div class="form-group inputtt col-1">
								<label for="name">Commit*</label>
							</div>
							<div class="form-group inputtt col-xl-6 col-lg-6 col-md-4 col-sm-12 col-xs-12">
								<label for="universityname">Football University</label>
							</div>
							<div class="form-group inputtt col">
								<label for="offer">Offer</label>
							</div>
							<div class="form-group inputtt col">
								<label for="date">Date</label>
							</div>
							<div class="form-group inputtt col">
							</div>
						</div> --}}
						<!-- New Row -->
						<?php
							//Convertimos una cadena de texto ["1,2,3,4,5"] a un array, le quitamos los corchetes y separamos por comas
							// dd(gettype($performance->college_offers_football_commit));
							$college_offers_football_commit = str_split($performance->college_offers_football_commit);
							//Guardamos solo los numeros del array
							$college_offers_football_commit_filter = array_filter($college_offers_football_commit, 'is_numeric');
							//Creamos un array con los valores numericos
							$college_offers_football_commit_filter = array_values($college_offers_football_commit_filter);
							$commit_array = array(
								'commit' => $college_offers_football_commit_filter,
								'university' => json_decode($performance->college_offers_football_university),
								'offer' => json_decode($performance->college_offers_offer),
								'date' => json_decode($performance->college_offers_date)
							);
							// dd($commit_array);
						?>
						@for($i = 0; $i < count($commit_array['date']); $i++)
						<div id="college_offers" class="form-row fst_row third_row">
							<div class="form-group inputtt col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12">
								{{-- <img src="{{ asset('template/assets/img/Line 5.png') }}" class="checkk" alt=""> --}}
									<label for="name">Commit*</label>
									{{-- {{ dd($commit_array['commit']) }} --}}
									@if(empty($commit_array['commit'][$i]))
									<input class="form-check-input" style="background= #2DC810;" type="checkbox" name="college_offers_football_commit_to_js[]" value="0">
									@elseif($commit_array['commit'][$i] == 1)
									<input class="form-check-input" style="background= #2DC810;" type="checkbox" name="college_offers_football_commit_to_js[]" value="1" checked>
									@elseif($commit_array['commit'][$i] == 0)
									<input class="form-check-input" style="background= #2DC810;" type="checkbox" name="college_offers_football_commit_to_js[]" value="0">
									@endif
							</div>
							<div class="form-group inputtt col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="universityname">Football University</label>
								<input type="text" class="form-control" id="university_name"
									placeholder="Ex. Alabama A&M University" name="college_offers_football_university[]" value="{{ $commit_array['university'][$i] }}">
							</div>
							<div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="offer">Offer</label>
								<select class="form-select" aria-label="select" name="college_offers_offer[]">
									<!-- Seleccionar una opcion dependiendo de la opcion que selecciono el usuario -->
									{{-- <option value="{{ $commit_array['offer'][$i] }}" selected>{{ $commit_array['offer'][$i] }}</option> --}}
									@if(!$commit_array['offer'][$i])
									<option value="" selected>Select</option>
									@endif
									<option value="Offer">Offer</option>
									<option value="Tour">Tour</option>
									{{-- <option value="Visited">Visited</option> --}}
								</select>
							</div>
							<div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="date">Date</label>
								<input type="date" class="form-control" id="input_date" name="college_offers_date[]" value="{{ $commit_array['date'][$i] }}">
							</div>
							<div class="form-group inputtt col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 mt-4">
								<!-- Delete Button -->
								<button type="button" class="btn btn-danger btn-sm btn_trash" onclick="delete_college_offers(this)">
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</div>
						@endfor
						<!-- End New Row -->

						<div id="add_college_offers" class="add academic_plus" style="cursor: pointer">
							<i class="fas fa-plus"></i><span class="another_row">Add Another Row</span>
						</div>
						<hr>
						<div class="top_space">
							<h3 class="featured_photos">Prospect Camps</h3>
						</div>
						{{-- <div class="form-row fst_row third_row">
							<div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="date">Date</label>
							</div>
							<div class="form-group inputtt col-xl-4 col-lg-4 col-md-3 col-sm-12 col-xs-12">
								<label for="name"> Name</label>
							</div>
							<div class="form-group inputtt col">
								<label for="kocation">Location</label>
							</div>
							<div class="form-group inputtt col">
								<label for="coach_name">Coach's Name</label>
							</div>
							<div class="form-group inputtt col">
							</div>
						</div> --}}
						<?php
							$prospects_camps = array(
								'date' => json_decode($performance->prospect_camps_date),
								'name' => json_decode($performance->prospect_camps_name),
								'location' => json_decode($performance->prospect_camps_location),
								'coach' => json_decode($performance->prospect_camps_coach_name)
							);

						?>
						
						@for($i = 0; $i < count($prospects_camps['date']); $i++)
						<div id="prospects_camps" class="form-row fst_row third_row">
							<div class="form-group inputtt col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<label for="date">Date</label>
								<input type="date" class="form-control" id="input_date" name="prospect_camps_date[]" value="{{ $prospects_camps['date'][$i] }}">
							</div>
							<div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="name"> Name</label>
								<input type="text" class="form-control" id="input_regional" name="prospect_camps_name[]"
									placeholder="Ex. Elite 11 Regional" value="{{ $prospects_camps['name'][$i] }}">
							</div>
							<div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="kocation">Location</label>
								<input type="text" class="form-control" id="prospect_camps_location" name="prospect_camps_location[]"
									placeholder="Ex. San Diego, CA" value="{{ $prospects_camps['location'][$i] }}">
								{{-- <select class="form-select" aria-label="select" name="prospect_camps_location[]">
									@if(!$prospects_camps['location'][$i])
									<option value="" selected>Select an option</option>
									@else
									<option value="{{ $prospects_camps['location'][$i] }}" selected>{{ $prospects_camps['location'][$i] }}</option>
									@endif
									<!--Here are the names of the cities in the dropdown menu-->
									<option value="San Francisco">San Francisco</option>
									<option value="Los Angeles">Los Angeles</option>
									<option value="Indianapolis">Indianapolis</option>
								</select> --}}
							</div>
							<div class="form-group inputtt col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<label for="coach_name">Coach's Name</label>
								<input type="input" class="form-control " id="input_coachs_name"
									placeholder="Ex. Mike Giovando" name="prospect_camps_coach_name[]" value="{{ $prospects_camps['coach'][$i] }}">
							</div>
							<div class="form-group mt-4 inputtt col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12">
								<!-- Delete Button -->
								<button type="button" class="btn btn-danger btn-sm btn_trash" onclick="delete_college_offers(this)">
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</div>
						@endfor
						<div id="add_prospects_camps" class="add academic_plus" style="cursor: pointer">
							<i class="fas fa-plus"></i><span class="another_row">Add Another Row</span>
						</div>
						<hr>
						{{-- <div class="top_space">
							<h3 class="featured_photos floatt">QB’s Statistical Analysis Scores</h3>
							<div class="score"><span class="sco">SCORE</span><span class="count">00</span></div>
						</div>
						<div class="form-row fst_row">
							<div class="form-group inputtt col">
								<label for="size">Size</label>
								<input type="number" class="form-control" id="input_size" placeholder="Ex. 00" name="size" value="{{ $performance->size }}">
							</div>
							<div class="form-group inputtt col">
								<label for="accurate">Accuracy</label>
								<input type="number" class="form-control" id="input_accuracy" placeholder="Ex. 00" name="accuracy" value="{{ $performance->accuracy }}">
							</div>
							<div class="form-group inputtt col">
								<label for="strength">Arm Strength</label>
								<input type="number" class="form-control " id="input_strength" placeholder="Ex. 00" name="arm_strength" value="{{ $performance->arm_strength }}">
							</div>
							<div class="form-group inputtt col">
								<label for="release">Release</label>
								<input type="number" class="form-control " id="input_release" placeholder="Ex. 00" name="release" value="{{ $performance->release }}">
							</div>
							<div class="form-group inputtt col">
								<label for="run">Throw on Run</label>
								<input type="number" class="form-control " id="input_run" placeholder="Ex. 00" name="throw_on_run" value="{{ $performance->throw_on_run }}">
							</div>
						</div>
						<div class="form-row fst_row">
							<div class="form-group inputtt col">
								<label for="footwork">Footwork</label>
								<input type="number" class="form-control" id="input_footwork" placeholder="Ex. 00" name="footwork" value="{{ $performance->footwork }}">
							</div>
							<div class="form-group inputtt col">
								<label for="poise">Poise</label>
								<input type="number" class="form-control" id="input_poise" placeholder="Ex. 00" name="poise" value="{{ $performance->poise }}">
							</div>
							<div class="form-group inputtt col">
								<label for="pocket">Pocket Presence</label>
								<input type="number" class="form-control " id="input_pocket" placeholder="Ex. 00" name="pocket_presence" value="{{ $performance->pocket_presence }}">
							</div>
							<div class="form-group inputtt col">
								<label for="decision">Decision Making</label>
								<input type="number" class="form-control " id="input_decision" placeholder="Ex. 00" name="decision_making" value="{{ $performance->decision_making }}">
							</div>
							<div class="form-group inputtt col">
								<label for="touch">Touch </label>
								<input type="number" class="form-control " id="input_touch" placeholder="Ex. 00" name="touch" value="{{ $performance->touch }}">
							</div>
						</div> --}}
						<br>
						<!-- Alert for the user if they have not filled out all the fields -->
                        <div class="alert alert-danger" role="alert" id="alert_user">
                            <h1>Please click SAVE to update your LIVE profile</h1>
                            <br><br>
                            <h3>If you do not click save, your changes will not be saved.</h3>
                            <h3>Support issues email <a class="issue_alert" href="mailto:catch@wrmag.com">catch@wrmag.com</a></h3>
                        </div>
						<br>
						<div class="row mt-4">
                            <div class="academic_btn">
                                <button class="appointment-btn scrollto" style="border: none;">SAVE</button>
                                <a class="appointment-btn scrollto" style="margin-top: 30px;" href="{{ url('profile/'.$profile->slug) }}" target="_blank">VIEW PROFILE</a>
								<a class="appointment-btn scrollto" style="margin-top: 30px;" id="copy_profile_link" onclick="copySlug('{{ url('profile/'.$profile->slug) }}')">COPY PROFILE LINK</a>
                            </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</section>


@endsection

@section('css')
<style>
	.form-check .form-check-input, .form-check-input[type=checkbox] {
    	/* float: left; */
    	/* margin-left: -1.5em; */
    	background-color: #2DC810 !important;
    	border: 1px solid #2DC810;
		display: flex;
		justify-content: center;
		align-content: center;
		margin: 10px auto;
	}

	a.btn, button.btn {
		border: 2px solid #2DC810;
		background: #2DC810;
	}

	input[type="date"]:not(.has-value):before{
		color: #000;
		content: attr(placeholder);
	}

	#upgrade_btn {
		font-size: 14px;
		padding: 5px 15px;
		margin-left: 100px;
	}

	@media (max-width: 767px) {
		/* .img_box_last {
			margin-bottom: 20px !important;
		} */

		.appointment-btn {
            width: 100%;
        }

		.form-check .form-check-input, .form-check-input[type=checkbox] {
			margin-left: 0px;
			width: 2em;
			height: 2em;
		}
	}

	.academic_btn {
		justify-content: center;
		align-items: center;
	}
</style>
@stop

@section('js')
<script>
    function copySlug(text) {
        var text = text
        navigator.clipboard.writeText(text).then(function() {
        console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
        console.error('Async: Could not copy text: ', err);
        });
    }
</script>
<script>
	function delete_college_offers(offer) {
		offer.parentNode.parentNode.remove();
	}
</script>
<script>
	// College Offers + Commits
	const add_college_offers = document.getElementById('add_college_offers');
	const college_offers = document.getElementById('college_offers');
	add_college_offers.addEventListener('click', function () {
		const new_college_offers = college_offers.cloneNode(true);
		const inputs = new_college_offers.getElementsByTagName('input');
		for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
		}
		const college_offers_count = document.querySelectorAll('#college_offers');
		college_offers_count[college_offers_count.length - 1].parentNode.insertBefore(new_college_offers, college_offers_count[college_offers_count.length - 1].nextSibling);
	});

	// Prospects Camps
	const add_prospects_camps = document.getElementById('add_prospects_camps');
	const prospects_camps = document.getElementById('prospects_camps');
	add_prospects_camps.addEventListener('click', function () {
		const new_prospects_camps = prospects_camps.cloneNode(true);
		const inputs = new_prospects_camps.getElementsByTagName('input');
		for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
		}
		const prospect_camps = document.querySelectorAll('#prospects_camps');
		prospect_camps[prospect_camps.length - 1].parentNode.insertBefore(new_prospects_camps, prospect_camps[prospect_camps.length - 1].nextSibling);
	});

	const form = document.getElementById('form_performance');
	form.addEventListener('submit', function (e) {
		// e.preventDefault();
		const college_offers_football_commit = document.getElementsByName('college_offers_football_commit_to_js[]');
		const college_offers_football_commit_array = [];
		for (let i = 0; i < college_offers_football_commit.length; i++) {
			college_offers_football_commit_array.push(college_offers_football_commit[i].checked ? 1 : 0);
		}
		const college_offers_football_commit_input = document.createElement('input');
		college_offers_football_commit_input.type = 'hidden';
		college_offers_football_commit_input.name = 'college_offers_football_commit[]';
		college_offers_football_commit_input.value = college_offers_football_commit_array;
		form.appendChild(college_offers_football_commit_input);
	});


	

</script>
@stop