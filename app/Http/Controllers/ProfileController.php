<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Performance;
use App\Models\Academic;
use App\Models\Media;
use App\Models\University;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all profiles order by abc order
        return view('admin.profiles.index', [
            'profiles' => Profile::orderBy('f_name', 'asc')->get(),
        ]);
    }

    public function indexSortable()
    {
        // Return all profiles order by abc order
        //Returnar solo los perfiles que estan activos
        return view('admin.profiles.indexSortable', [
            'profiles' => Profile::where('show_profile', 1)->orderBy('sort_order', 'asc')->get(),
        ]);
    }

    public function top_one_hundred()
    {
        return view('admin.profiles.top_one_hundred', [
            'profiles_add' => Profile::where('top_one_hundred', 0)->orderBy('f_name', 'asc')->get(),
            'top_one_hundred' => Profile::where('top_one_hundred', '!=', null)->orderBy('top_one_hundred', 'asc')->get(),
            'total_top_one_hundred' => Profile::where('top_one_hundred', '!=', 0)->count(),
        ]);
    }

    public function topOneHundredStore(Request $request)
    {
        $profile_data = $request->except('_token');

        $profiles = $request->top_profiles;

        if($profiles == null) {
            return redirect()->back()->with('error', 'Please select at least one profile.');
        }

        foreach ($profiles as $profile) {
            $profile = Profile::find($profile);
            $profile_data['top_one_hundred'] = Profile::where('top_one_hundred', '!=', 0)->count() + 1;
            if($profile_data['top_one_hundred'] <= 100) {
                $profile->update($profile_data);
            } else {
                return redirect()->back()->with('error', 'The top 100 list is full');
            }
        }

        return redirect()->back()->with('success', 'The profiles were successfully added to the top 100 list');
    }

    public function sortTopOneHundred()
    {
        return view('admin.profiles.sort_top_one_hundred', [
            'top_one_hundred' => Profile::where('top_one_hundred', '!=', 0)->orderBy('top_one_hundred', 'desc')->get(),
            'total_top_one_hundred' => Profile::where('top_one_hundred', '!=', 0)->count(),
        ]);
    }

    public function updateTopOneHundred(Request $request)
    {

        $total_profiles = count($request->order);

        if (request()->has('order')) {
            $sortable = request()->get('order');
            for($i = 1; $i <= $total_profiles; $i++) {
                //Vamos a darle la posición inverso a la que se le ha dado al usuario
                $profile = Profile::find($sortable[$i - 1]);
                $profile->top_one_hundred = $total_profiles - $i + 1;
                $profile->save();
            }
            return response()->json(['success' => 'Order saved successfully.']);
        } else {
            return response()->json(['error' => 'Order not saved.']);
        }
    }

    public function deleteTopOneHundred($profile_id)
    {
        $profile = Profile::find($profile_id);
        if($profile != null) {
            $profile->top_one_hundred = 0;
            $profile->save();
            return redirect()->back()->with('success', 'The top 100 list has been updated');
        } else {
            return redirect()->back()->with('error', 'The top 100 list has not been updated');
        }
    }

    public function updateOrder(Request $request)
    {
        if (request()->has('order')) {
            $sortable = request()->get('order');
            $i = 1;
            foreach ($sortable as $id) {
                $data = [
                    'sort_order' => $i,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                Profile::where('id', $id)->update($data);
                $i++;
            }
        }

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.profiles.create');
    }

    public function getSlug($f_name, $l_name)
    {
        $slug = str_slug($f_name . ' ' . $l_name); 
        $slug_exists = Profile::where('slug', $slug)->first();
        if($slug_exists) {
            $slug = $slug . '-' . rand(1, 100);
        }

        return $slug;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $profile_info = $request->except('_token');
        $password = str_random(8);
        $profile_info['password'] = bcrypt($password);
        $profile_info['username'] = strtolower($profile_info['f_name'] . $profile_info['l_name'] . rand(1, 99));
        $profile_info['terms'] = 1;
        $profile_info['slug'] = $this->getSlug($profile_info['f_name'], $profile_info['l_name']);
        $profile = Profile::create($profile_info);

        if($profile) {
            $data = array(
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'email' => $request->qb_email,
                'username' => $profile_info['username'],
                'password' => $password,
            );
            $this->sendMailAccount($data);
            $this->sendConfirmationEmail($profile->id);
            return redirect()->back()->with('success', 'Profile created successfully');
        } else {
            return redirect()->back()->with('error', 'Profile creation failed');
        }
    }

    public function sendMailAccount($data) 
    {
        $url = 'https://api.sendgrid.com/';

        $pass = env('MAIL_PASSWORD');

        $params = array(
            'to'        => $data['email'],
            'toname'    => $data['f_name'] . ' ' . $data['l_name'],
            'from'      => "info@wrmag.com",
            'fromname'  => 'Quarterback Magazine',
            'subject'   => 'We Created Your Account',
            'html'      => view('emails.account_created', $data)->render(),
        );

        $request =  $url.'api/mail.send.json';

        // Generate curl request
        $session = curl_init($request);
        // Tell PHP not to use SSLv3 (instead opting for TLS)
        if ( ! defined('CURL_SSLVERSION_TLSv1_2')) {
            define('CURL_SSLVERSION_TLSv1_2', 6);
        }
        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $pass));
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // obtain response
        $response = curl_exec($session);
        curl_close($session);
        
        return true;

    }

    public function sendConfirmationEmail($profile_id)
    {

        $profile = Profile::find($profile_id);

        $data = array(
            'id' => $profile->id,
            'f_name' => $profile->f_name,
            'l_name' => $profile->l_name,
            'email' => $profile->qb_email,
            'subject' => 'Hi, ' . $profile->f_name . ' ' . $profile->l_name . ' Welcome to Quarterback Magazine! Please confirm your email address.',
        );

        $url = 'https://api.sendgrid.com/';
        $pass = env('MAIL_PASSWORD');

        $params = array(
            'to'        => $data['email'],
            'toname'    => $data['f_name'] . ' ' . $data['l_name'],
            'from'      => "info@wrmag.com",
            'fromname'  => 'Quarterback Magazine',
            'subject'   => 'Confirm your email',
            'html'      => view('emails.confirm_email', $data)->render(),
        );

        $request =  $url.'api/mail.send.json';

        $session = curl_init($request);
        if ( ! defined('CURL_SSLVERSION_TLSv1_2')) {
            define('CURL_SSLVERSION_TLSv1_2', 6);
        }

        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $pass));
        curl_setopt ($session, CURLOPT_POST, true);
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($session);
        curl_close($session);

        return redirect()->back()->with('success', 'Please check your email!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /* return view('admin.profiles.edit', [
            'profile' => Profile::find($id)
        ]); */
        $profile = Profile::where('id', $id)->first();
        if($profile) {
            Session::put('profile_id', $profile->id);
            Session::put('email', $profile->qb_email);
            return redirect('/profile-about/' . $profile->slug);
        } else {
            return redirect('/admin/profiles')->with('error', 'Profile not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profile = Profile::find($id);

        if($profile){
            $this->userNotificationForDelete($id);
            return redirect()->route('profiles.index')->with('success','Profile Deleted Successfully');
        } else {
            return redirect()->route('profiles.index')->with('error','Profile Not Found');
        }
    }

    public function userNotificationForDelete($id)
    {
        $profile = Profile::find($id);
        $data = array(
            'id' => $profile->id,
            'user' => $profile->f_name . ' ' . $profile->l_name,
            'email' => $profile->qb_email,
        );

        $url = 'https://api.sendgrid.com/';
        $pass = env('MAIL_PASSWORD');
        $params = array(
            'to'        => $data['email'],
            'toname'    => $data['user'],
            'from'      => "hello@wrmag.com",
            'fromname'  => 'Quarterback Magazine',
            'subject'   => 'Profile Deleted',
            'html'      => view('emails.profile_deleted', $data)->render(),
        );
        $request =  $url.'api/mail.send.json';
        $session = curl_init($request);
        if ( ! defined('CURL_SSLVERSION_TLSv1_2')) {
            define('CURL_SSLVERSION_TLSv1_2', 6);
        }
        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $pass));
        curl_setopt ($session, CURLOPT_POST, true);
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($session);
        curl_close($session);

        return true;
    }

    public function profileAbout($slug)
    {
        //Search profile by slug
        $profile = Profile::where('slug', $slug)->first();

        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        if(!$profile || $profile->active_membership != 1) {
            return view('frontend.not_found', [
                            'message' => 'This profile is not available',
            ]);
        }

        if($profile_id_session != $profile->id) {
            return redirect('/profile/' . $profile->slug);
            
        }

        if(!$profile->confirm_email || $profile->confirm_email != 1) {
            return redirect('/confirm-email');
        }

        //Get membership
        $membership = $profile->membership;

        $section_locked = $this->sectionLocked($profile->id);

        if(!session()->has('profile_id') || $profile->membership_id == null) {

            return redirect()->route('frontend.redirect-profile');
        }

        $school = $profile->where('id', $profile->id)->with('university')->first();

        return view('frontend.profile.profile-about', [
            'profile' => $profile->where('id', $profile->id)->with('university')->first(),
            'membership' => $membership,
            'universities' => University::all(),
            'section_locked' => $section_locked,
        ]);
    }

    public function validatePhoneNumber($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if(strlen($phone) == 7) {
            $phone = preg_replace('/([0-9]{3})([0-9]{4})/', '$1-$2', $phone);
        } elseif(strlen($phone) == 10) {
            $phone = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '$1-$2-$3', $phone);
        } else {
            return false;
        }

        return $phone;

    }

    public function profileAboutSave(Request $request)
    {
        $profile_info = $request->except(['_token', '_method', 'copy_slug', 'profile_id']);

        $profile_id = $request->profile_id;

        $validate_phone = $this->validatePhoneNumber($profile_info['phone']);
        if(!$validate_phone) {
            return redirect()->back()->with('error', 'The format of the phone number is not valid, must be 123-456-7890');
        }

        $profile_info['phone'] = $validate_phone;

        $validate_coach_phone = $this->validatePhoneNumber($profile_info['qb_coachs_mobile']);
        if(!$validate_coach_phone) {
            return redirect()->back()->with('error', 'The format of the coach phone number is not valid, must be 123-456-7890');
        }

        $profile_info['qb_coachs_mobile'] = $validate_coach_phone;

        $validate_profile =  $this->validateProfileSessionPost($request->profile_id);
        if($validate_profile) {
            return $validate_profile;
        }

        if($profile_info['country'] == 'null' || $profile_info['country'] == 'N/A') {
            $profile_info['country'] = null;
        }

        if($profile_info['qb_email'] == $profile_info['parent_email']) {
            return redirect()->back()->with('error', 'Parent email and QB email cannot be same');
        }
        
        $profile = Profile::where('id', $profile_id)->first();

        if($request->hasFile('profile_photo')) {
            
            if($profile->profile_photo != null) {
                Storage::delete('public/' . $profile->profile_photo);
            }
            $profile_info['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        if($request->hasFile('profile_cover_header')) {

            if($profile->profile_cover_header != null) {
                Storage::delete('public/' . $profile->profile_cover_header);
            }
            $profile_info['profile_cover_header'] = $request->file('profile_cover_header')->store('profile_cover_headers', 'public');
        }

        $updated = Profile::where('id', $profile->id)->update($profile_info);

        if($updated) {
            return redirect()->to('/profile-about/' . $profile->slug)->with('success', 'Profile Updated Successfully');
        } else {
            return redirect()->to('/profile-about/' . $profile->slug)->with('error', 'Profile Updated Failed');
        }
    }

    public function profileUpdate(Request $request)
    {
        $profile_info = $request->except(['_token', '_method', 'copy_slug', 'profile_id']);

        $profile_info = json_decode($profile_info['data']);

        return response()->json([
            'status' => 'success',
            'message' => 'Profile Updated Successfullyss',
            'profile' => $request->_token,
        ]);

        if(!session()->has('profile_id')) {
            return response()->json(['error' => 'Session Expired']);
        }
    }

    public function profilePerformance($slug)
    {
        //Search profile by slug
        $profile = Profile::where('slug', $slug)->first();
        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        //Get membership
        $membership = $profile->membership;

        $validate_profile =  $this->validateProfileSession($profile->id);

        $section_locked = $this->sectionLocked($profile->id);

        if($validate_profile) {
            return $validate_profile;
        }

        //Create a performance data if not exist
        $performance = Performance::where('profile_id', $profile->id)->first();
        if(!$performance) {
            $performance = new Performance;
            $performance->college_offers_football_commit = '[null]';
            $performance->college_offers_football_university = '[null]';
            $performance->college_offers_offer = '[null]';
            $performance->college_offers_date = '[null]';
            $performance->prospect_camps_date = '[null]';
            $performance->prospect_camps_name = '[null]';
            $performance->prospect_camps_location = '[null]';
            $performance->prospect_camps_coach_name = '[null]';
            $performance->profile_id = $profile->id;
            $performance->save();
        }

        // return Performance::where('profile_id', $profile->id)->first();

        return view('frontend.profile.profile-performance', [
            'profile' => $profile,
            'performance' => Performance::where('profile_id', $profile->id)->first(),
            'membership' => $membership,
            'section_locked' => $section_locked,
        ]);
    }

    public function getStatisticalAnalysisScores($data)
    {
        
    }

    public function profilePerformanceSave(Request $request)
    {
        $validate_profile =  $this->validateProfileSessionPost($request->profile_id);
        if($validate_profile) {
            return $validate_profile;
        }
        
        $profile_performance = Performance::where('profile_id', session('profile_id'))->first();
        $profile_info = $request->except(['_token', '_method', 'college_offers_football_commit_js', 'profile_id']);

        if($profile_performance) {

            if(!isset($profile_info['college_offers_football_commit']) || !isset($profile_info['college_offers_football_university']) || !isset($profile_info['college_offers_offer']) || !isset($profile_info['college_offers_date'])) {
                $profile_info['college_offers_football_commit'] = json_encode([null]);
                $profile_info['college_offers_football_university'] = json_encode([null]);
                $profile_info['college_offers_offer'] = json_encode([null]);
                $profile_info['college_offers_date'] = json_encode([null]);
            }

            if(!isset($profile_info['prospect_camps_date']) || !isset($profile_info['prospect_camps_name']) || !isset($profile_info['prospect_camps_location']) || !isset($profile_info['prospect_camps_coach_name'])) {
                $profile_info['prospect_camps_date'] = json_encode([null]);
                $profile_info['prospect_camps_name'] = json_encode([null]);
                $profile_info['prospect_camps_location'] = json_encode([null]);
                $profile_info['prospect_camps_coach_name'] = json_encode([null]);
            }

            $updated = $profile_performance->update($profile_info);
        }
        
        if($updated) {
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Profile could not be updated');
        }
    }

    //Function para verificar si el perfil esta en la sesion
    public function validateProfileSessionPost($profile_id)
    {
        if(session('profile_id') != $profile_id) {
            return redirect()->to('/sign-in')->with('error', 'You are not allowed to access this profile');
        }
    }

    public function profileAcademic($slug)
    {
        //Search profile by slug
        $profile = Profile::where('slug', $slug)->first();
        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        //Get membership
        $membership = $profile->membership;

        $validate_profile =  $this->validateProfileSession($profile->id);

        $section_locked = $this->sectionLocked($profile->id);

        if($validate_profile) {
            return $validate_profile;
        }

        //Create a academic data if not exist  
        $academic = Academic::where('profile_id', session('profile_id'))->first();
        if(!$academic) {
            $academic = new Academic;
            $academic->football_career_honors_year = '[null]';
            $academic->football_career_honors = '[null]';
            $academic->hight_school_stats_year = '[null]';
            $academic->hight_school_stats_games_played = '[null]';
            $academic->hight_school_stats_completions = '[null]';
            $academic->hight_school_stats_passing_attempts = '[null]';
            $academic->hight_school_stats_passing_yards = '[null]';
            $academic->hight_school_stats_passing_tds = '[null]';
            $academic->hight_school_stats_rushing_yards = '[null]';
            $academic->hight_school_stats_rushing_tds = '[null]';
            $academic->profile_id = session('profile_id');
            $academic->save();
        }

        //Array with the benefits of the membership
        $permissions = array(
            'wonderlic_practice_test' => $membership->name == 'PRACTICE SQUAD' ? true : ($membership->name == 'STARTER' ? true : ($membership->name == 'ALL-PRO' ? true : false)),
        );

        return view('frontend.profile.profile-academic', [
            'profile' => $profile,
            'academic' => $academic,
            'membership' => $membership,
            'permissions' => $permissions,
            'section_locked' => $section_locked,
        ]);
    }

    private function sectionLocked($id)
    {
        $profile = Profile::where('id', $id)->first();
        $section_locked = false;
        $membership = $profile->membership;

        return $section_locked;
    }

    public function profileAcademicSave(Request $request)
    {
        $validate_profile =  $this->validateProfileSessionPost($request->profile_id);
        if($validate_profile) {
            return $validate_profile;
        }

        $profile_academic = Academic::where('profile_id', session('profile_id'))->first();
        $profile_info = $request->except(['_token', '_method', 'profile_id']);

        if($profile_academic) {

            if(!isset($profile_info['hight_school_stats_year']) || !isset($profile_info['hight_school_stats_games_played']) || !isset($profile_info['hight_school_stats_completions']) || !isset($profile_info['hight_school_stats_passing_attempts']) || !isset($profile_info['hight_school_stats_passing_yards']) || !isset($profile_info['hight_school_stats_passing_tds']) || !isset($profile_info['hight_school_stats_rushing_yards']) || !isset($profile_info['hight_school_stats_rushing_tds'])) {

                $profile_info['hight_school_stats_year'] = json_encode([null]);
                $profile_info['hight_school_stats_games_played'] = json_encode([null]);
                $profile_info['hight_school_stats_completions'] = json_encode([null]);
                $profile_info['hight_school_stats_passing_attempts'] = json_encode([null]);
                $profile_info['hight_school_stats_passing_yards'] = json_encode([null]);
                $profile_info['hight_school_stats_passing_tds'] = json_encode([null]);
                $profile_info['hight_school_stats_rushing_yards'] = json_encode([null]);
                $profile_info['hight_school_stats_rushing_tds'] = json_encode([null]);
            }

            if(!isset($profile_info['football_career_honors_year']) || !isset($profile_info['football_career_honors'])) {
                $profile_info['football_career_honors_year'] = json_encode([null]);
                $profile_info['football_career_honors'] = json_encode([null]);
            }
            
            if($request->hasFile('wonderlic_practice_test')) {
            
                if($profile_academic->wonderlic_practice_test != null) {
                    Storage::delete('public/' . $profile_academic->wonderlic_practice_test);
                }
                $profile_info['wonderlic_practice_test'] = $request->file('wonderlic_practice_test')->store('wonderlic_practice_test', 'public');
            }
            $updated = $profile_academic->update($profile_info);
        } 
        
        if($updated) {
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Profile could not be updated');
        }
    }

    public function validateProfileSession($id)
    {
        $profile = Profile::where('id', $id)->first();

        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        if(!$profile || $profile_id_session != $profile->id || $profile->active_membership != 1) {
            return view('frontend.not_found', [
                'message' => 'This profile is not available',
            ]);
        }

        if(!session()->has('profile_id') || $profile->membership_id == null || $profile->active_membership != 1) {

            return redirect()->route('frontend.redirect-profile');
        }

        return false;
    }

    public function validateProfileSessionAndMembership($id)
    {
        $profile = Profile::where('id', $id)->first();

        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        //Get membership
        $membership = $profile->membership;

        if(!$profile || $profile_id_session != $profile->id || $profile->active_membership != 1) {
            return view('frontend.not_found', [
                'message' => 'This profile is not available',
            ]);
        }

        if($membership->price == 0 || $membership->price == 0.00 || $membership->name == 'BEGINNER') {
            return redirect()->route('frontend.memberships');

        }

        if(!session()->has('profile_id') || $profile->membership_id == null || $profile->active_membership != 1) {

            return redirect()->route('frontend.redirect-profile');
        }

        return false;
    }

    public function profileMedia($slug)
    {
        //Search profile by slug
        $profile = Profile::where('slug', $slug)->first();
        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        //Get membership
        $membership = $profile->membership;

        // $validate_profile =  $this->validateProfileSessionAndMembership($profile->id);
        $validate_profile =  $this->validateProfileSession($profile->id);

        $section_locked = $this->sectionLocked($profile->id);

        if($validate_profile) {
            return $validate_profile;
        }

        //Create a academic data if not exist
        $media = Media::where('profile_id', session('profile_id'))->first();
        if(!$media) {
            $media = new Media;
            $media->featured_photos_upload = '[null]';
            $media->media_highlights_youtube_video_Link = '[null]';
            $media->pro_day_feature_video_youtube_video_link = null;
            $media->throwing_mechanic_feature_video_youtube_video_link = null;
            $media->profile_id = $profile_id_session;
            $media->save();
        }

        //Array with the benefits of the membership
        $drag_photos_permission = $membership->name == 'ALL-PRO' ? true : ($membership->name == 'STARTER' ? true : false);

        if(json_decode($media->media_highlights_youtube_video_Link) == null) {
            $media->media_highlights_youtube_video_Link = '[null]';
            $media->save();
        }
        $permissions = array(
            // 'drag_files' => $membership->name == 'ALL-PRO' ? true : ($membership->name == 'STARTER' ? true : false),
            'drag_files' => true,
            'pro_day_future_video' => $membership->name == 'ALL-PRO' ? true : false,
            'throwing_mechanic_feature_video' => $membership->name == 'ALL-PRO' ? true : false,
            'media_highlights' => $membership->name == 'BEGINNER' ? 2 : ($membership->name == 'PRACTICE SQUAD' ? 4 : ($membership->name == 'STARTER' ? 6 : ($membership->name == 'ALL-PRO' ? 8 : 0))),
            'has_media_highlights' => count(json_decode($media->media_highlights_youtube_video_Link)),
        );

        return view('frontend.profile.profile-media', [
            'profile' => $profile,
            'media' => $media,
            'membership' => $membership,
            'permissions' => $permissions,
            'section_locked' => $section_locked,
        ]);
    }


    public function profileMediaSave(Request $request)
    {
        //Obtenemos los datos de media, segun el usuario logueado
        $media = Media::where('profile_id', session('profile_id'))->first();

        if($media->featured_photos_upload == null) {
            $media->featured_photos_upload = '[null]';
            $media->save();
        }

        //Obtenemos la membresia del usuario
        $membership = $media->profile->membership;

        //Contamos cuantos elementos tiene el array featured_photos_upload
        $count_featured_photos_upload = count(json_decode($media->featured_photos_upload));

        if(json_decode($media->featured_photos_upload)[0] == null) {
            $media->featured_photos_upload = '[]';
            $media->save();
        }

        // Membership Permissions
        if($membership->name == 'BEGINNER') {
            $membership_permission = 2;
        }  elseif($membership->name == 'PRACTICE SQUAD') {
            $membership_permission = 4;
        }  elseif($membership->name == 'STARTER') {
            $membership_permission = 6;
        }  elseif($membership->name == 'ALL-PRO') {
            $membership_permission = 8;
        }

        if($count_featured_photos_upload >= $membership_permission) {
            return response()->json(['error' => 'You have reached the maximum number of photos']);
        }

        //Recibimos la foto, esto se ejecuta una vez por imágen
        $image = $request->file('file');

        //Creamos un nombre unico para la imagen
        $image_name = 'profile_'. session('profile_id').'_'.uniqid() . $image->getClientOriginalName();

        //Ruta de la imagen para guardarla en la BD
        $image_path = 'profile_media/' . $image_name;

        //Array con los datos de la imagen
        $images = [
            'image_name' => $image_name,
            'image_path' => $image_path,
            'sort_order' => 0,
        ];

        //Condición para verificar si TIENE alguna imagen
        if($media->featured_photos_upload != null) {
            $new_image_array = json_decode($media->featured_photos_upload);
            $count_old = count($new_image_array);
            $images['sort_order'] = $count_old + 1;
            $new_image_array[] = $images;
            //El sort_order será la posición de la imagen del array que se agregó más uno
            $count_new = count($new_image_array);
            // return response()->json(['old' => $count_old, 'new' => $count_new]);
            if($count_new > $count_old) {
                $media->featured_photos_upload = json_encode($new_image_array);
                //Guardamos en la BD
                $media->save();
                $image->storeAs('public/profile_media', $image_name);
                return response()->json(['success' => $new_image_array]);
            } else {
                return response()->json(['error' => 'Error']);
            }
        } else {
            //Condición para verificar si NO TIENE imagen
            $images['sort_order'] = 1;
            $images_array[] = $images;
            $media->featured_photos_upload = json_encode($images_array);
            //Guardamos en la BD
            $media->save();
            $image->storeAs('public/profile_media', $image_name);

            return response()->json(['First Photo' => $image_name]);
        }

        // return response()->json(['success' => $image_name]);
    }

    public function profileMediaSaveData(Request $request)
    {
        $validate_profile =  $this->validateProfileSessionPost($request->profile_id);
        if($validate_profile) {
            return $validate_profile;
        }

        $profile_media = Media::where('profile_id', session('profile_id'))->first();
        $profile_info = $request->except(['_token', '_method', 'profile_id']);

        if($request->media_highlights_youtube_video_Link != null) {
            $video_links = $request->media_highlights_youtube_video_Link;
            foreach ($video_links as $video_link) {

                //Invalid Links
                if(str_contains($video_link, 'instagram.com/') || str_contains($video_link, 'twitter.com/') || str_contains($video_link, 'facebook.com/') || str_contains($video_link, 'hudl.com/v/') || str_contains($video_link, 'hudl.com/profile/')) {
                    return redirect()->back()->with('error', 'Invalid video link');
                }

                if(str_contains($video_link, 'youtube.com/watch') || str_contains($video_link, 'hudl.com/v') || str_contains($video_link, 'youtu.be/') || str_contains($video_link, 'hudl.com/video') || str_contains($video_link, 'hudl.com/embed')) {
                    // return response()->json(['success' => 'Video Links Saved']);
                } else {
                    return redirect()->back()->with('error', 'Invalid Video Link');
                }
            }
        }

        $profile_info['media_highlights_youtube_video_Link'] = json_encode($request->media_highlights_youtube_video_Link);
        if($profile_media) {
            
            $updated = $profile_media->update($profile_info);
        }
        
        if($updated) {
            return redirect()->back()->with('success', 'Profile Media updated successfully');
        } else {
            return redirect()->back()->with('error', 'Profile Media could not be updated');
        }

    }

    public function orderMedia()
    {
        $body = request()->getContent();
        $res = json_decode($body, true);
        $media = Media::where('profile_id', $res['user_id'])->first();
        //Todo el array de fotos
        $array_photos = json_decode($media->featured_photos_upload);
        //Nombre de la imagen que se moverá
        $image_moved = $res['image_name'];
        //Posición en la que se encuentra la imagen
        $image_moved_position = array_search($image_moved, array_column($array_photos, 'image_name'));
        //Posición de la imagen que se moverá, es el nuevo sort_order
        $image_replaced_position = $res['position'];
        //Elemento que en su sort_order tenga como valor
        foreach($array_photos as $photo) {
            if($photo->sort_order == $image_replaced_position) {
                //El elemento que estaba en la posición pasada
                $image_replaced = $photo;
            }
        }
        // El elemento que se moverá, el que se mueve
        $image_moved_element_sort_order = $array_photos[$image_moved_position];
        $sort_order_new = $image_replaced->sort_order;
        $sort_order_old = $image_moved_element_sort_order->sort_order;
        $image_moved_element_sort_order->sort_order = $sort_order_new;
        $image_replaced->sort_order = $sort_order_old;

        // return response()->json(['success' => $array_photos]);
        $media->featured_photos_upload = json_encode($array_photos);
        $media->save();

        return response()->json(['success' => 'success']);
    }

    public function profileMediaSaveTest(Request $request)
    {
        // $cantidad = 0;
        $image = $request->file('file');
        $image_name = 'profile_'. session('profile_id').'_'.uniqid() . $image->getClientOriginalName();
        $image_path = 'profile_media/' . $image_name;
        //Creamos un array con todos los nombres de las imagenes
        $images = [
            'image_name' => $image_name,
            'image_path' => $image_path,
            'sort_order' => 0,
        ];
        $images_array[] = $images;
        $media = Media::where('profile_id', session('profile_id'))->first();
        if($media->featured_photos_upload != null) {
            // $cantidad = $media->featured_photos_upload + 1;
            // $media->featured_photos_upload = $cantidad;
            $new_image_array = json_decode($media->featured_photos_upload);
            $new_image_array[] = $images;
            $media->featured_photos_upload = json_encode($new_image_array);
            
        } else {
            // $media->featured_photos_upload = 1;
            $media->featured_photos_upload = $images_array;

        }
        $saved = $media->save();
        if($saved) {
            $image->storeAs('public/profile_media', $image_name);
        } else {
            return response()->json(['error' => 'Error saving image'], 500);
        }
        return response()->json(['success' => $image_name]);
    }

    public function getProfileMedia($id)
    {
        $media = Media::where('profile_id', $id)->first();
        if($media) {
            return response()->json(['data' => $media->featured_photos_upload]);
        } else {
            return response()->json(['error' => 'No media found']);
        }
    }

    public function profileMediaDelete($image_name)
    {
        $media = Media::where('profile_id', session('profile_id'))->first();
        if($media) {
            $images_array = json_decode($media->featured_photos_upload);
            foreach ($images_array as $image) {
                if($image->image_name == $image_name) {
                    $sort_order = $image->sort_order;
                    Storage::delete('public/' . $image->image_path);
                    $new_image_array = array_filter($images_array, function($item) use ($image_name) {
                        return $item->image_name != $image_name;
                    });
                    foreach($new_image_array as $image_array) {
                        if($image_array->sort_order > $sort_order) {
                            $image_array->sort_order = $image_array->sort_order - 1;
                        }
                    }
                    // return response()->json(['Sort order de la imágen' => $new_image_array]);
                    if(count($new_image_array) == 0) {
                        $media->featured_photos_upload = null;
                    } else {
                        foreach($new_image_array as $new_image) {
                            $insert_array[] = $new_image;
                        }
                        $media->featured_photos_upload = $insert_array;
                    }
                    $media->save();
                    return response()->json(['success' => 'Image deleted successfully', 'data' => json_encode($images_array)]);
                }
            }
        } else {
            return response()->json(['error' => 'No media found']);
        }
    }

    //We must count the visits that a profile has and show them
    public function userProfile($slug)
    {
        //Search profile by slug
        $profile = Profile::where('slug', $slug)->first();

        if(!$profile) {
            $message = 'Profile not found';	
            return view('frontend.not_found', compact('message'));
        }

        $performance = Performance::where('profile_id', $profile->id)->first();
        if(!$performance) {
            $performance = new Performance;
            $performance->college_offers_football_commit = '[null]';
            $performance->college_offers_football_university = '[null]';
            $performance->college_offers_offer = '[null]';
            $performance->college_offers_date = '[null]';
            $performance->prospect_camps_date = '[null]';
            $performance->prospect_camps_name = '[null]';
            $performance->prospect_camps_location = '[null]';
            $performance->prospect_camps_coach_name = '[null]';
            $performance->profile_id = $profile->id;
            $performance->save();
        } 
        
        $academic = Academic::where('profile_id', $profile->id)->first();
        if(!$academic) {
            $academic = new Academic;
            $academic->football_career_honors_year = '[null]';
            $academic->football_career_honors = '[null]';
            $academic->hight_school_stats_year = '[null]';
            $academic->hight_school_stats_games_played = '[null]';
            $academic->hight_school_stats_completions = '[null]';
            $academic->hight_school_stats_passing_attempts = '[null]';
            $academic->hight_school_stats_passing_yards = '[null]';
            $academic->hight_school_stats_passing_tds = '[null]';
            $academic->hight_school_stats_rushing_yards = '[null]';
            $academic->hight_school_stats_rushing_tds = '[null]';
            $academic->profile_id = $profile->id;
            $academic->save();
        }

        $media = Media::where('profile_id', $profile->id)->first();
        if(!$media) {
            $media = new Media;
            $media->featured_photos_upload = '[null]';
            $media->media_highlights_youtube_video_Link = '[null]';
            $media->pro_day_feature_video_youtube_video_link = null;
            $media->throwing_mechanic_feature_video_youtube_video_link = null;
            $media->profile_id = $profile->id;
            $media->save();
        }

        if(!$profile){
            $message = 'Profile not found';
            return view('frontend.not_found', compact('message'));
        }

        $profile->views = $profile->views + 1;
        $profile->save();

        //Get the post form WordPress API
        $url_wordpress = 'https://wp.quarterbackmagazine.com/wp-json/wp/v2/posts?per_page=4';
        $posts_wordpress = json_decode(file_get_contents($url_wordpress));
        foreach ($posts_wordpress as $post_wordpress) {
            $featured_media = json_decode(file_get_contents('https://wp.quarterbackmagazine.com/wp-json/wp/v2/media/' . $post_wordpress->featured_media));
            $image_url = $featured_media->guid->rendered;
            $post_wordpress->featured_media = $image_url;
        }

        return view('frontend.profile', [
            'profile' => $profile,
            'performance' => $performance,
            'academic' => $academic,
            'media' => $media,
            'posts_wordpress' => $posts_wordpress,
        ]);
    }

    public function upgradeMembership($id)
    {
        $profile = Profile::find($id);
        
        if(!$profile) {
            $message = 'Profile not found';
            return view('frontend.not_found', compact('message'));
        }

        $membersip = $profile->membership;

        $url = explode('/', request()->url());
        $segment = $url[count($url) - 1];

        return view('admin.profiles.upgrade_membership', [
            'profile' => $profile,
            'membership' => $membersip,
            'memberships' => Membership::all(),
            'is_paid' => $segment == 'upgrade-paid' ? true : false,
        ]);
    }

    public function fillAcademicStats()
    {
        $academic = Academic::all();

        foreach($academic as $profile) {
            $profile->hight_school_stats_year = '[null]';
            $profile->hight_school_stats_games_played = '[null]';
            $profile->hight_school_stats_completions = '[null]';
            $profile->hight_school_stats_passing_attempts = '[null]';
            $profile->hight_school_stats_passing_yards = '[null]';
            $profile->hight_school_stats_passing_tds = '[null]';
            $profile->hight_school_stats_rushing_yards = '[null]';
            $profile->hight_school_stats_rushing_tds = '[null]';
            $profile->save();
        }

        return response()->json(['success' => 'Academic stats filled successfully']);
    }

    public function removeAcademicTest(Request $request)
    {
        //Search profile Academic by id
        $academic = Academic::find($request->id);
        if(!$academic) {
            return response()->json(['error' => 'No academic found']);
        } else {
            //Remove wonderlic_practice_test from database and delete file from storage
            $academic_file = $academic->wonderlic_practice_test;
            $academic->wonderlic_practice_test = null;
            $academic->save();

            if($academic_file) {
                Storage::delete('public/'.$academic_file);
            }
            return response()->json(['success' => 'Academic test removed successfully']);
        }
    }

public function fixSocialMediaUsers()
    {
        $profiles = Profile::all();

        foreach($profiles as $profile) {
            if($profile->instagram) {
                $profile->instagram = str_replace('@', '', $profile->instagram);
                $profile->save();
            }
            if($profile->tiktok) {
                $profile->tiktok = str_replace('@', '', $profile->tiktok);
                $profile->save();
            }
            if($profile->twitter) {
                $profile->twitter = str_replace('@', '', $profile->twitter);
                $profile->save();
            }
        }
        return response()->json(['success' => 'Social media users fixed successfully']);
    }

    public function fixCountryProfile()
    {
        $profiles = Profile::all();
        foreach($profiles as $profile) {
            if($profile->country == 'United States' || $profile->country == 'United States of America') {
                $profile->country = null;
                $profile->save();
            }
        }
        return response()->json(['success' => 'Country profiles fixed successfully']);
    }

    public function fixPhoneNumbers()
    {
        $profiles = Profile::all();
        $numbers = [];
        foreach($profiles as $profile) {
            if($profile->phone) {
                
                $phone = str_replace(' ', '', $profile->phone);
                $phone = str_replace(')', '-', $phone);
                $phone = str_replace('(', '', $phone);

                if($phone == '--') {
                    $profile->phone = null;
                    $profile->save();
                } else {
                    $profile->phone = $phone;
                    $profile->save();
                }

                $numbers[] = $phone;
            }
        }

        return response()->json(['success' => $numbers]);
    }

    public function fixParentsEmail()
    {
        $profiles = Profile::all();
        foreach($profiles as $profile) {
            if($profile->parent_email) {
                if($profile->qb_email == $profile->parent_email) {
                    $profile->parent_email = null;
                    $profile->save();
                }
            }
        }

        return response()->json(['success' => 'Parents emails fixed successfully']);

    }
}
