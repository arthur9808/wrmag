<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Membership;
use App\Models\Faqs;
use App\Models\Profile;
use App\Models\Setting;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
/* MailChimp */
use DrewM\MailChimp\MailChimp;
use App\Rules\GoogleRecaptcha;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function home()
    {
        // $profiles = Profile::where('active_membership', 1)->where('show_profile', 1)->with('university')->orderBy('sort_order', 'asc')->take(20)->get();

        $profiles = Profile::where('top_one_hundred', '>=', 1)->with('university')->orderBy('top_one_hundred', 'desc')->get();

        foreach ($profiles as $profile) {
            $academic = Academic::where('profile_id', $profile->id)->first();
            $profile->academic = $academic;
        }

        return view('frontend.home', [
            'profiles' => $profiles,
            'states' => Profile::select('State')->distinct()->orderBy('State', 'asc')->get(),
            'classes' => Profile::select('recruiting_class_of')->distinct()->get()->sortBy('recruiting_class_of')->values()->all(),
            'positions' => Profile::select('position')->distinct()->get(),
        ]);
    }

    /**
     * Show ADA page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */
    public function ada()
    {
        return view('frontend.ada');
    }


    /**
     * Show Privacy Policy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */
    public function privacyPolicy()
    {
        return view('frontend.privacy');
    }

    /**
     * Show All Profiles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function profiles()
    {

        $profiles = Profile::where('active_membership', 1)->orderBy('top_one_hundred', 'desc')->orderBy('id', 'asc')->distinct('id')->paginate(52);

        foreach ($profiles as $profile) {
            $academic = Academic::where('profile_id', $profile->id)->first();
            $profile->academic = $academic;
        }


        return view('frontend.profiles', [
            'profiles' => $profiles,
            'current_page' => $profiles->currentPage(),
            'links' => $profiles->links(),
            'states' => Profile::select('State')->distinct()->orderBy('State', 'asc')->get(),
            'classes' => Profile::select('recruiting_class_of')->distinct()->get()->sortBy('recruiting_class_of')->values()->all(),
            'positions' => Profile::select('position')->distinct()->get(),
            'top_one_hundred' => Profile::where('top_one_hundred', '!=', null)->orderBy('top_one_hundred', 'asc')->take(10)->get(),
        ]);
    }

    public function profilesTest()
    {
        $profiles = Profile::where('active_membership', 1)->orderBy('top_one_hundred', 'desc')->distinct('id')->paginate(52);

        foreach ($profiles as $profile) {
            $academic = Academic::where('profile_id', $profile->id)->first();
            $profile->academic = $academic;
        }


        return $profiles; 
        return view('frontend.profiles', [
            'profiles' => $profiles,
            'current_page' => $profiles->currentPage(),
            'links' => $profiles->links(),
            'states' => Profile::select('State')->distinct()->orderBy('State', 'asc')->get(),
            'classes' => Profile::select('recruiting_class_of')->distinct()->get()->sortBy('recruiting_class_of')->values()->all(),
            'positions' => Profile::select('position')->distinct()->get(),
            'top_one_hundred' => Profile::where('top_one_hundred', '!=', null)->orderBy('top_one_hundred', 'asc')->take(10)->get(),
        ]);
    }

    public function fixTopProfiles()
    {
        $profiles = Profile::where('top_one_hundred', null)->get();
        foreach ($profiles as $profile) {
            if($profile->top_one_hundred == null) {
                $profile->top_one_hundred = 0;
                $profile->save();
            }
        }
    }

    /**
     * Show 100 profiles in the top 100 list.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */
    public function topOneHundredProfiles()
    {
        $profiles = Profile::where('top_one_hundred', '!=', null)->orderBy('top_one_hundred', 'asc')->paginate(12);
        foreach ($profiles as $profile) {
            $academic = Academic::where('profile_id', $profile->id)->first();
            $profile->academic = $academic;
        }
        return view('frontend.top_one_hundred_profiles', [
            'top_one_hundred' => $profiles,
            'current_page' => $profiles->currentPage(),
            'links' => $profiles->links(),
        ]);
    }

    /**
     *  Search profiles by name, state, class, position, etc.
     * @param Request $request
     */
    public function searchProfiles(Request $request)
    {
        if($request->recruiting_class_of) {

            $profiles = Profile::where('recruiting_class_of', $request->recruiting_class_of)->get();

        } else if($request->position) {

            $profiles = Profile::where('position', $request->position)->get();
            
        } else if($request->state) {

            $profiles = Profile::where('State', $request->state)->get();
        } else if($request->quarterback_search) {

            $profiles = Profile::where('f_name', 'like', '%' . $request->quarterback_search . '%')
                                ->orWhere('l_name', 'like', '%' . $request->quarterback_search . '%')
                                ->orWhere(DB::raw('CONCAT(f_name, " ", l_name)'), 'like', '%' . $request->quarterback_search . '%')
                                ->orWhere('position', 'like', '%' . $request->quarterback_search . '%')
                                ->orWhere('recruiting_class_of', 'like', '%' . $request->quarterback_search . '%')
                                ->get();
            
        } else {

            return redirect()->back()->with('error', 'Please fill in at least one field');
        }

        foreach ($profiles as $profile) {
            $academic = Academic::where('profile_id', $profile->id)->first();
            $profile->academic = $academic;
        }

        $profiles_top = Profile::where('top_one_hundred', '!=', null)->orderBy('top_one_hundred', 'asc')->get();
        foreach ($profiles_top as $profile) {
            $academic = Academic::where('profile_id', $profile->id)->first();
            $profile->academic = $academic;
        }

        
        return view('frontend.profiles', [
            'profiles' => $profiles,
            'current_page' => null,
            'links' => null,
            'states' => Profile::select('State')->distinct()->get(),
            'classes' => Profile::select('recruiting_class_of')->distinct()->get(),
            'positions' => Profile::select('position')->distinct()->get(),
            'top_one_hundred' => $profiles_top,
        ]);
    }

    public function memberships()
    {   
        $id_profile = session('profile_id') ? session('profile_id') : 0;
        $profile = Profile::where('id', $id_profile)->first();
        $has_membership = false;

        if(!$profile) {
            $has_membership = false;
        } else {
            $has_membership = $profile->membership ? true : false;
        }

        if($has_membership) {
            $membership = $profile->membership;
        }

        return view('frontend.memberships',[
            'memberships' => Membership::with('benefits')->get(),
            'has_membership' => $has_membership,
            'membership_profile' => $membership ?? null,
        ]);
    }

    public function coaches()
    {
        $states = Coach::select('state')->distinct()->orderby('state', 'asc')->get();
        $coaches = Coach::orderBy('sort_order', 'asc')->get();

        return view('frontend.coaches', 
            [
                'states' => $states,
                'coaches' => $coaches,
            ]
        );
    }

    public function coach($id)
    {
        $coachInfo = Coach::find($id);

        if(!$coachInfo) {
            return view('frontend.not_found');
        }
        $upconmingCamps = array(
            'name' => json_decode($coachInfo->upcoming_camps_name) ? json_decode($coachInfo->upcoming_camps_name) : [],
            'date' => json_decode($coachInfo->upcoming_camps_date) ? json_decode($coachInfo->upcoming_camps_date) : [],
            'end_date' => json_decode($coachInfo->upcoming_camps_end_date) ? json_decode($coachInfo->upcoming_camps_end_date) : [],
            'location' => json_decode($coachInfo->upcoming_camps_location ) ? json_decode($coachInfo->upcoming_camps_location) : [],
            'link' => json_decode($coachInfo->upcoming_camps_link ) ? json_decode($coachInfo->upcoming_camps_link) : [],
        );

        $college_nfl_qbs_trained = array(
            'name' => json_decode($coachInfo->college_nfl_qbs_trained_name) ? json_decode($coachInfo->college_nfl_qbs_trained_name) : [],
            'college' => json_decode($coachInfo->college_nfl_qbs_trained_college) ? json_decode($coachInfo->college_nfl_qbs_trained_college) : [],

        );

        $featured_images = json_decode($coachInfo->featued_images) ?? [];
        if(!empty($featured_images)) {
            $featured_images = str_replace('\\', '/', $featured_images);
            $featured_images = str_replace('//', '/', $featured_images);
            $featured_images = str_replace('"', '', $featured_images);
        }

        return view('frontend.coach', [
            'coach' => $coachInfo,
            'upconmingCamps' => $upconmingCamps,
            'college_nfl_qbs_trained' => $college_nfl_qbs_trained,
            'featured_images' => $featured_images,
        ]);
    }

    public function searchCoaches(Request $request)
    {
        $coaches = Coach::where('state', $request->state)->get();

        return view('frontend.coaches', [
            'coaches' => $coaches
        ]);
    }

    public function tour()
    {
        return view('frontend.tour');
    }

    public function contact()
    {
        return view('frontend.contact');

    }

    public function sendMailContactForm(Request $request)
    {
        $contact_email = Setting::where('place', 'contact')->first();
        $contact_email = json_decode($contact_email->value);
        $send_email = true;
        

        $validator = $this->validate($request, [
            'g-recaptcha-response' => ['required', new GoogleRecaptcha]
        ],[ 'g-recaptcha-response.required' => 'The recaptcha field is required.']);   

        if(!$validator) {

            $send_email = false;
            return redirect()->back()->with('error', 'Please check the recaptcha field');

        } else {

            if($send_email) {

                //Mailchimp
                $athlete_name = explode(' ', $request->athlete_name);
                $f_name = $athlete_name[0];
                $l_name = $athlete_name[1] ?? $athlete_name[0];
                $mailchimp = new Mailchimp(env('MAILCHIMP_API_KEY'));
                $list_id = env('MAILCHIMP_LIST_ID');
                $mailchimp->post("lists/$list_id/members", [
                    'email_address' => $request->input_email,
                    'status'        => 'subscribed',
                    'merge_fields'  => [
                        'FNAME' => $f_name,
                        'LNAME' => $l_name,
                        'PHONE' => $request->phone,
                        'PARENT' => $request->parent_name,
                        'GRADE' => $request->grade,
                        'CITYE' => $request->input_city,
                        'TYPE' => $request->who_is,
                    ],
                ]);

                //Second Post to Mailchimp
                $mailchimp->post("lists/$list_id/members", [
                    'email_address' => $request->secondary_email,
                    'status'        => 'subscribed',
                    'merge_fields'  => [
                        'FNAME' => $f_name,
                        'LNAME' => $l_name,
                        'PHONE' => $request->phone,
                        'PARENT' => $request->parent_name,
                        'GRADE' => $request->grade,
                        'CITYE' => $request->input_city,
                        'TYPE' => $request->who_is,
                    ],
                ]);

                $data = array(
                    'name' => $request->athlete_name,
                    'parent' => $request->parent_name,
                    'grade' => $request->grade,
                    'email' => $request->input_email,
                    'secondary_email' => $request->secondary_email ?? '',
                    'phone' => $request->phone,
                    'city' => $request->input_city ?? '',
                    'message' => $request->message,
                    'general' => $request->who_is,
                );

                $email_subject = $request->input_email;

                foreach($contact_email as $email) {
                    
                    $url = 'https://api.sendgrid.com/';
                    $pass = env('MAIL_PASSWORD');

                    $params = array(
                        'to'        => $email,
                        'toname'    => 'Quarterback Magazine Website',
                        'from'      => $email_subject,
                        'fromname'  => 'Quarterback Magazine',
                        'replyto'   => $email_subject,
                        'subject'   => 'Contact Form - ' . $email_subject,
                        'html'      => view('emails.contact', $data)->render(),
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
                }
            }
            return redirect()->back()->with('success', 'Thanks for contacting us!');
        }
    }        

    public function faqs()
    {
        $faqs =  Faqs::all();
        
        return view('frontend.faqs', [
            'faqs' => $faqs,
        ]);
    }

    public function loginFrontEnd()
    {   
        if(Auth::check()) {
            return redirect('/home');
        }
        return view('frontend.login');
    }

    public function verifySessionToRedirect()
    {
        if (Session::has('profile_id')) {
            return redirect()->route('frontend.home');
        }
    }

    public function signUp()
    {
        $verify_session = $this->verifySessionToRedirect();
        if ($verify_session) {
            return $verify_session;
        }
        
        return view('frontend.signup');
    }
    

    public function loginProfile(Request $request)
    {
        $profile = Profile::where('username', $request->username)->first();

        if($profile) {
            if(password_verify($request->password, $profile->password)) {

                Session::put('profile_id', $profile->id);
                Session::put('email', $profile->qb_email);
                if(!$profile->active_membership) {
                    return redirect('/redirect-profile');
                }

                return redirect('/profile-about/' . $profile->slug);
                
            } else {
                return redirect()->back()->with('error', 'Wrong username or password.');
            }
        } else {
            return redirect()->back()->with('error', 'Wrong username or password.');
        }
    }

    public function redirectToProfile()
    {
        // If the user has not a membership, redirect to the membership page
        $profile = Profile::find(Session::get('profile_id'));

        if($profile->confirm_email) {

            if($profile->membership_id == null) {

                //Redirect to new view - Buy a membership right now
                // return view('frontend.need_membership');

                //Redirect to /complete-payment-logged-free and create a free membership
                $membership_id = Membership::where('price', '0.00')->first()->id;
                return redirect('/complete-payment-logged-free/' . $membership_id);
                
            } else {
                return redirect('/profile-about/' . $profile->slug);
            }
        } else {
            // Redirect Confirm Email Route
            return redirect()->route('frontend.confirm-email');
        }

    }

    public function logOutProfile()
    {
        Session::forget('profile_id');
        return redirect('/');
    }

    public function logOutAdmin()
    {
        Session::forget('profile_id');
        return redirect('/home');
    }

    public function socialMedia()
    {
        return Setting::where('place', 'social-media')->get();
    }

    public function resetPassword()
    {   
        return view('frontend.reset_password');
    }

    public function resetPasswordPost(Request $request)
    {
        $profile = Profile::where('qb_email', $request->email)->first();
        

        if($profile) {
            $profile->password_token = str_random(60);
            $profile->save();
            $data = array(
                'f_name' => $profile->f_name,
                'l_name' => $profile->l_name,
                'username' => $profile->username,
                'email' => $profile->qb_email,
                'password' => $profile->password,
                'token' => $profile->password_token,
            );

            $url = 'https://api.sendgrid.com/';
            $pass = env('MAIL_PASSWORD');

            $params = array(
                'to'        => $data['email'],
                'toname'    => $data['f_name'] . ' ' . $data['l_name'],
                'from'      => "info@wrmag.com",
                'fromname'  => 'Quarterback Magazine',
                'subject'   => 'Request to reset password',
                'html'      => view('emails.reset_password', $data)->render(),
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
            return redirect()->back()->with('success', 'Please check your email!, If you can not find the email, check your spam folder');

        } else {
            return redirect()->back()->with('error', 'Email not found!');
        }
    }

    public function changePasswordWithToken($token)
    {
        $profile = Profile::where('password_token', $token)->first();

        if($profile) {
            return view('frontend.change_password', [
                'profile' => $profile,
                'token' => $token,
            ]);
        } else {
            return redirect()->route('frontend.reset-password')->with('error', 'Token not found!');
        }
    }

    public function changePasswordWithTokenPost(Request $request)
    {
        $profile = Profile::where('password_token', $request->user_token)->first();

        if($profile) {
            $profile->password = bcrypt($request->password);
            $profile->password_token = null;
            $profile->save();

            return redirect()->route('frontend.login')->with('success', 'Password changed!');
        } else {
            return redirect()->route('frontend.reset-password')->with('error', 'Token not found!');
        }
    }

    public function confirmEmail()
    {
        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        $profile = Profile::find($profile_id_session);
        if($profile) {
            if($profile->confirm_email) {
                return redirect('/profile-about/' . $profile->slug);
            } else {
                return view('frontend.confirm_email', [
                    'profile' => $profile,
                ]);
            }
        } else {
            return redirect('/sign-in')->with('error', 'You need to login first!');
        }
    }

    public function sendAllConfirmationEmails(Request $request)
    {
        $profiles = Profile::all();
        foreach($profiles as $profile) {
            if($profile->confirm_email != 1) {
                $this->sendConfirmationEmail($profile->id);
            }
        }
        return redirect()->back()->with('success', 'All emails sent!');
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

    public function confirmEmailSave($id_profile)
    {
        $profile = Profile::find($id_profile);
        if($profile) {
            if($profile->confirm_email == 1) {
                return redirect()->route('frontend.login')->with('success', 'The email has already been confirmed, please log in to check the status of your account!');
            } else {
                $profile->confirm_email = 1;
                $profile->save();
                $this->sendWelcomeEmail($profile->id);
                Session::put('profile_id', $profile->id);
                Session::put('email', $profile->qb_email);
                return redirect()->route('frontend.redirect-profile')->with('success', 'Email confirmed!');
            }
        } else {
            return redirect()->route('frontend.login')->with('error', 'Profile not found!');
        }
    }

    public function sendWelcomeEmail($profile_id)
    {
        $profile = Profile::find($profile_id);
        $data = array(
            'id' => $profile->id,
            'f_name' => $profile->f_name,
            'l_name' => $profile->l_name,
            'email' => $profile->qb_email,
            'subject' => 'Hi, ' . $profile->f_name . ' ' . $profile->l_name . ' Welcome to Quarterback Magazine!',
        );
        $url = 'https://api.sendgrid.com/';
        $pass = env('MAIL_PASSWORD');
        $params = array(
            'to'        => $data['email'],
            'toname'    => $data['f_name'] . ' ' . $data['l_name'],
            'from'      => "info@wrmag.com",
            'fromname'  => 'Quarterback Magazine',
            'subject'   => 'Welcome to Quarterback Magazine',
            'html'      => view('emails.welcome', $data)->render(),
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
        return redirect()->back()->with('success', 'Welcome email sent!');
    }

    function fixCoachPhone(){
        // All profiles
        $profiles = Profile::all();
        $coaches_mobile = [];
        foreach($profiles as $profile) {

            if($profile->qb_coachs_mobile) {
                
                $phone = str_replace(' ', '', $profile->qb_coachs_mobile);
                $phone = str_replace(')', '-', $phone);
                $phone = str_replace('(', '', $phone);

                if($phone == '--' || $phone == '-' || $phone == '0' || $phone == '0--' || $phone == '0-' || $phone == '000-000-0000') {
                    $profile->qb_coachs_mobile = null;
                    $profile->save();
                } 
                else {
                    $profile->qb_coachs_mobile = $phone;
                    $profile->save();
                }

                $coaches_mobile[] = $phone;
            }
        }

        return $coaches_mobile;
    }

    public function confirmEmailView()
    {
        $profile = Profile::find(194);

        $data = array(
            'id' => $profile->id,
            'user' => $profile->f_name . ' ' . $profile->l_name,
            'email' => $profile->qb_email,
        );
        return view('emails.profile_deleted', $data);
    }   
}
