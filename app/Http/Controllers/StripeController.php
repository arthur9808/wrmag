<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
//use Carbon to format date
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\Membership;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifySessionToRedirect()
    {
        if (Session::has('profile_id')) {
            return redirect()->route('frontend.home');
        }
    }
    
    public function completePayment($id)
    {
        //
        $verify_session = $this->verifySessionToRedirect();
        if ($verify_session) {
            return $verify_session;
        }

        $membership = Membership::find($id);

        if(!$membership){
            return redirect()->route('frontend.home');
        }

        return view('frontend.buy_membership', [
            'membership' => $membership,
        ]);
    }

    public function completePaymentFree($id)
    {
        //
        $membership = Membership::find($id);

        if ($membership->price != 0) {
            return redirect()->route('frontend.home');
        }

        return view('frontend.buy_membership_free', [
            'membership' => $membership,
        ]);
    }

    

    public function completePaymentLogged($id)
    {
        //
        $membership = Membership::find($id);

        if(session()->has('profile_id')) {
            $profile = Profile::find(session('profile_id'));

            if($profile->membership_id != null) {
                return redirect()->route('home');
            }
        } else {
            $profile = false;
        }
        
        return view('frontend.buy_membership_logged', [
            'membership' => $membership,
            'profile' => $profile
        ]);
    }

    public function completedPaymentLogged(Request $request)
    {
        if(session()->has('profile_id')) {
            $profile = Profile::find(session('profile_id'));
        } else {
            return redirect()->route('login');
        }

        //Get membership data
        $membership = Membership::find($request->membership_id);

        //Create a customer in Stripe account
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create([
            "name" => $profile->f_name . ' ' . $profile->l_name,
            "email" => $profile->qb_email,
            "source" => $request->stripeToken
        ]);

        if($customer->id) {

            //Attach the plan to the customer.
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $attached_plan = Stripe\Subscription::create([
                "customer" => $customer->id,
                "items" => [
                    [
                        "plan" => $membership->product_id
                    ]
                ]
            ]);

            if($attached_plan) {

                //Update Membership Status
                $profile_info_update = array(
                    'membership_id' => $membership->id,
                );

                $profile->update($profile_info_update);

                // Save payment info
                $payment_info = array(
                    'profile_id' => $profile->id,
                    'membership_id' => $membership->id,
                    'method' => 'Stripe',
                    'status' => 'Completed',
                    'amount' => $membership->price,
                    'description' => $membership->name,
                    'product' => $membership->name,
                    'interval' => $membership->interval_membership,
                    'start_date' => Carbon::now(),
                    'end_date' => $membership->interval_membership == 'month' ? Carbon::now()->addMonth() : Carbon::now()->addYear(),
                );

                $notification = $this->sendMailAdmin($profile->id, 'Payment');

                $payed = Payment::create($payment_info);

                if($payed) {

                    $profile_info_update = array(
                        'active_membership' => 1,
                        'stripe_customer_id' => $customer->id,
                    );

                    $profile->update($profile_info_update);

                    Session::put('profile_id', $profile->id);
                    Session::put('email', $profile->qb_email);
                    return redirect('/profile-about/' . $profile->slug);

                } else {
                    Session::flash('error', 'Error to save payment info.');
                    return back();
                }

            } else {
                Session::flash('error', 'Error to attach plan to customer.');
                return back();
            }

        } else {
            Session::flash('error', 'Error to create customer in Stripe.');
            return back();
        }
    }

    public function cancelSubscription($subscription_id)
    {
        $profile = Profile::find($subscription_id);

        if($profile->stripe_customer_id == null || $profile->active_membership == 0) {
            $this->userNotificationForDelete($profile->id);
            $deleted = $profile->delete();

            if($deleted) {
                return redirect()->back()->with('success', 'Subscription canceled and profile deleted successfully.');

            } else {
                return redirect()->back()->with('error', 'Error to cancel subscription.');
            }
        }

        $customer_id = $profile->stripe_customer_id;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::retrieve($customer_id);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $subscription = Stripe\Subscription::all(['customer' => $customer_id]);
        $res_cancel = Stripe\Subscription::retrieve($subscription->data[0]->id)->cancel();

        if($res_cancel->status == 'canceled') {

            //Eliminamos el customer de stripe
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Stripe\Customer::retrieve($customer_id);
            $deleted = $customer->delete();

            if($deleted) {
                $this->userNotificationForDelete($profile->id);
                $profile->delete();
                return redirect()->back()->with('success', 'Subscription canceled and profile deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Error to cancel subscription.');
            }
        } else {
            return redirect()->back()->with('error', 'Error to cancel subscription.');
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

    /**
     * Make a membership payment
     * 
     * Create profile and send account creation email
     *
     */

    private function ValidatePassword($password)
    {
        // $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/';
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/';
        if(!preg_match($pattern, $password)) {
            Session::flash('error', 'Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one number and one special character.');
            return back();
        }
    }


    private function createPayment($profile, $membership)
    {
        $payment_info = array(
            'profile_id' => $profile->id,
            'membership_id' => $membership->id,
            'method' => 'Stripe',
            'status' => 'Completed',
            'amount' => $membership->price,
            'description' => $membership->name,
            'product' => $membership->name,
            'interval' => $membership->interval_membership,
            'start_date' => Carbon::now(),
            'end_date' => $membership->interval_membership == 'month' ? Carbon::now()->addMonth() : Carbon::now()->addYear(),
        );

        $payed = Payment::create($payment_info);

        return $payed;
    }

    private function createProfile($profile)
    {
        $profile = Profile::create($profile);
        return $profile;

    }

    private function validateProfile($qb_email, $username)
    {
        $validate_email = Profile::where('qb_email', $qb_email)->first();
        $validate_username = Profile::where('username', $username)->first();
        if($validate_email || $validate_username) {
            return redirect()->back()->with('error', 'Email or username already exists.');
        } 
    }

    private function searchCustomerByEmailStripe($email)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::all(['email' => $email]);
        if($customer->data) {
            return $customer->data[0]->id;
        } else {
            return false;
        }
    }

    private function createStripeAccount($profile)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer_exists = $this->searchCustomerByEmailStripe($profile['qb_email']);
        if($customer_exists) {
            return false;
        }

        $customer = Stripe\Customer::create([
            "name" => $profile['f_name'] . ' ' . $profile['l_name'],
            "email" => $profile['qb_email'],
            "source" => $profile['stripe_token']
        ]);

        return $customer;
    }

    private function CreatedStripeAccuntAndAttachedPlan($profile, $membership)
    {
        $customer = $this->createStripeAccount($profile);
        if($customer) {
            if($customer->id) {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $attached_plan = Stripe\Subscription::create([
                    "customer" => $customer->id,
                    "items" => [
                        [
                            "plan" => $membership->product_id,
                        ],
                    ],
                ]);

                if($attached_plan) {
                    $customer_and_plan = array(
                        'customer' => $customer,
                        'plan' => $attached_plan,
                    );
                    if($customer_and_plan['plan']->status != 'active') {
                        $this->deleteCustomerFromStripe($customer_and_plan['customer']->id);
                        return $customer_and_plan;
                    } 
                    return $customer_and_plan;
                } else {
                    return redirect()->back()->with('error', 'Error to attach plan.');
                }
            } else {
                return redirect()->back()->with('error', 'Error to create subscription.');
            }
        } else {
            return redirect()->back()->with('error', 'Error to create stripe account.');
        }
        
    }

    private function deleteCustomerFromStripe($customer_id)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::retrieve($customer_id);
        $customer->delete();
        return true;
    }


    private function sendNotificationsAndStartSession($profile_id, $password)
    {
        $profile_created = Profile::find($profile_id);
        $profile_email = array(
            'f_name' => $profile_created->f_name,
            'l_name' => $profile_created->l_name,
            'qb_email' => $profile_created->qb_email,
            'password' => $password,
            'username' => $profile_created->username,
        );
        
        $this->sendConfirmationEmail($profile_created->id);
        $this->sendMailAccount($profile_email);

        $profile_info_update = array(
            'active_membership' => 1,
        );

        $profile_created->update($profile_info_update);
        
        Session::put('profile_id', $profile_created->id);
        Session::put('email', $profile_created->qb_email);
        return redirect('/redirect-profile');
    }

    public function completedPayment(Request $request)
    {
        //Valdiate Password
        $validate_password = $this->ValidatePassword($request->password);
        if($validate_password) {
            return $validate_password;
        }

        $profile = array(
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'qb_email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'i_am' => $request->i_am,
            'terms' => $request->terms,
            'stripe_token' => $request->stripeToken,
        );

        $validate_profile = $this->validateProfile($request->email, $request->username);

        if($validate_profile) {
            return $validate_profile;
        }
        
        //Get membership data
        $membership = Membership::find($request->membership_id);
        $customer_plan = $this->CreatedStripeAccuntAndAttachedPlan($profile, $membership);
        if($customer_plan['plan']->status == 'active') {

            if($customer_plan instanceof \Illuminate\Http\RedirectResponse) {
                return $customer_plan;
            }

            $profile_created = $this->createProfile(array(
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'qb_email' => $request->email,
                'email' => $request->email,
                'username' => $request->username,
                'parent_name' => $request->parent_name,
                'parent_email' => $request->parent_email,
                'password' => bcrypt($request->password),
                'i_am' => $request->i_am,
                'terms' => $request->terms,
                'stripe_customer_id' => $customer_plan['customer']->id,
                'membership_id' => $membership->id,
                'slug' => $this->getSlug($request->f_name, $request->l_name)
            ));

            $this->createPayment($profile_created, $membership);
            $this->sendMailAdmin($profile_created->id, 'Registration');

            return $this->sendNotificationsAndStartSession($profile_created->id, $request->password);
            
        } else {
            return redirect()->back()->with('error', 'Error to create subscription.');
        }

        
    }

    

    public function completedPaymentFree(Request $request) 
    {
        $validate_password = $this->ValidatePassword($request->password);
        if($validate_password) {
            return $validate_password;
        }

        if($request->email == $request->parent_email) {
            return redirect()->back()->with('error', 'Parent email and QB email cannot be same');
        }

        $validate_profile = $this->validateProfile($request->email, $request->username);

        if($validate_profile) {
            return $validate_profile;
        }

        $membership = Membership::where('name', 'BEGINNER')->first();

        $profile_created = $this->createProfile(array(
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'qb_email' => $request->email,
            'email' => $request->email,
            'username' => $request->username,
            'parent_name' => $request->parent_name,
            'parent_email' => $request->parent_email,
            'password' => bcrypt($request->password),
            'i_am' => $request->i_am,
            'terms' => $request->terms,
            'membership_id' => $membership->id,
            'slug' => $this->getSlug($request->f_name, $request->l_name)
        ));

        if($profile_created) {
            
            $this->sendMailAdmin($profile_created->id, 'Registration');

            return $this->sendNotificationsAndStartSession($profile_created->id, $request->password);

        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function completePaymentLoggedFree($id)
    {
        //
        if(session()->has('profile_id')) {

            $profile = Profile::find(session('profile_id'));

            if($profile->active_membership == 1) {
                Session::flash('error', 'You already have an active membership.');
                return back();
            }

            //Get membership data
            $membership = Membership::find($id);


            // Save payment info
            $payment_info = array(
                'profile_id' => $profile->id,
                'membership_id' => $membership->id,
                'method' => 'Free',
                'status' => 'Completed',
                'amount' => $membership->price,
                'description' => $membership->name,
                'product' => $membership->name,
                'interval' => $membership->interval_membership,
                'start_date' => Carbon::now(),
                'end_date' => $membership->interval_membership == 'month' ? Carbon::now()->addMonth() : Carbon::now()->addYear(),
            );

            $payed = Payment::create($payment_info);

            $notification = $this->sendMailAdmin($profile->id, 'Payment');

            if($payed) {

                $profile_info_update = array(
                    'membership_id' => $membership->id,
                    'active_membership' => 1,
                );

                $profile->update($profile_info_update);
                Session::put('profile_id', $profile->id);
                Session::put('email', $profile->qb_email);
                return redirect('/profile-about/' . $profile->slug);

            } else {
                Session::flash('error', 'Error to save payment info.');
                return back();
            }

        } else {
            return redirect()->route('frontend.login');
        }
    }

    public function sendMailAccount($data) 
    {
        $url = 'https://api.sendgrid.com/';

        $pass = env('MAIL_PASSWORD');

        $params = array(
            'to'        => $data['qb_email'],
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


    /* Función que envia un correo electrónico al administrador cuando se crea una cuenta nueva */
    public function sendMailAdmin($id_profile, $type) 
    {
        $url = 'https://api.sendgrid.com/';
        $admin_email = env('MAIL_ADMIN');

        $profile = Profile::find($id_profile);

        $membership = Membership::find($profile->membership_id);

        if(!$membership) {
            $membership_name = 'BEGINNER';
            $membership_price = 'FREE';
        } else {
            $membership_name = $membership->name;
            $membership_price = $membership->price;
        }

        if($type == 'Payment') {
            $subject = 'A profile has paid for their membership';
        } else if ($type == 'Registration') {
            $subject = 'A profile has created an account';
        } else if ($type == 'Upgrade') {
            $subject = 'A profile has upgraded their membership';
        } else if ($type == 'Downgrade') {
            $subject = 'A profile has downgraded their membership';
        } else if ($type == 'Cancel') {
            $subject = 'A profile has canceled their membership';
        }


        if($membership_name == 'BEGINNER' || $membership_price == 'FREE' || $membership_price == '0.00') {
            $subject = 'A profile has received a free membership';
        }

        $data_profile = array(
            'f_name' => $profile->f_name,
            'l_name' => $profile->l_name,
            'email' => $profile->qb_email,
            'username' => $profile->username,
            'membership' => $membership_name,
            'price' => $membership_price,
            'subject' => $subject,
            'is_free' => $membership_name == 'BEGINNER' ? true : false,
        );

        $pass = env('MAIL_PASSWORD');

        $params = array(
            'to'        => $admin_email,
            'toname'    => 'Quarterback Magazine Website',
            'from'      => 'info@wrmag.com',
            'fromname'  => 'Quarterback Magazine',
            'subject'   => $subject,
            'html'      => view('emails.admin_account_created', $data_profile)->render(),
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

    public function upgradeMemberhsip($id_profile, $membership_product_id)
    {
        $profile = Profile::find($id_profile);

        $stripe_id = $profile->stripe_customer_id;
        $stripe_plan = $membership_product_id;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $subscription = \Stripe\Subscription::all(array("customer" => $stripe_id));

        $membership = Membership::where('product_id', $membership_product_id)->first();
        
        if($subscription->data) {
            
            $subscription = \Stripe\Subscription::update($subscription->data[0]->id, array(
                "plan" => $stripe_plan,
            ));

            if($subscription) {

                $this->savePaymentDB($profile, $membership);

                $profile->membership_id = $membership->id;
                $profile->save();

                // $this->sendMailAdmin($id_profile, 'Upgrade');

                $this->sendMailUpgradeUser($id_profile);
            } 

        } else {
            
            $profile->membership_id = $membership->id;
            $profile->save();
        }

        return $subscription;
    }

    public function upgradeMembershipTest($id_membership) {

        // Search membership by id
        $membership = Membership::find($id_membership);

        // Get user logged 
        $profile_id_session = session('profile_id') ? session('profile_id') : 0;

        $profile = Profile::find($profile_id_session);

        if($profile ) {
            $profile_membership = $profile->membership;
        } else {
            return view('frontend.not_found', [ 'message' => 'Profile not found']);
        }

        // Validate membership
        if($membership) {
            // Validate membership
            if($membership->id == $profile_membership->id) {
                return view('frontend.not_found', [ 'message' => 'You already have this membership']);
            } else {
                // Validate membership
                if($membership->price > $profile_membership->price) {
                    // $this->upgradeMemberhsip();
                    return view('frontend.upgrade_membership', [
                        'membership' => $membership,
                        'profile' => $profile,
                    ]);

                } else {
                    return view('frontend.not_found', [ 'message' => 'You cannot upgrade to this membership']);
                }
            }
        } else {
            return view('frontend.not_found', [ 'message' => 'Membership not found']);
        }

        
    }

    public function completedUpgrade(Request $request)
    {
        $profile = Profile::find($request->profile_id);
        $profile_membership = $profile->membership;

        // Membership Solicitada    
        $membership_request = Membership::find($request->membership_id);

        // Si el perfil no tiene un stripe_id lo registramos en stripe
        if(!$profile->stripe_customer_id) {

            //Create a customer in Stripe account
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Stripe\Customer::create([
                "name" => $profile->f_name.' '.$profile->l_name,
                "email" => $profile->qb_email,
                "source" => $request->stripeToken
            ]);

            if($customer->id) {
            
                //Attach the plan to the customer.
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $attached_plan = Stripe\Subscription::create([
                    "customer" => $customer->id,
                    "items" => [
                        [
                            "plan" => $membership_request->product_id
                        ]
                    ]
                ]);

                if($attached_plan->id) {
                    $profile->stripe_customer_id = $customer->id;
                    $profile->membership_id = $membership_request->id;
                    $profile->save();

                    // Save payment info
                    $this->savePaymentDB($profile, $membership_request);

                    //Email Upgrade Membership to Admin and User
                    $this->sendMailAdmin($profile->id, 'Upgrade');

                    //User Email
                    $this->sendMailUpgradeUser($profile->id);

                    // Redirect to profile
                    return redirect('/profile-about/'.$profile->slug)->with('success', 'Membership upgraded successfully');
                } else {
                    return view('frontend.not_found', [ 'message' => 'Error attaching plan to customer']);
                }

            } else {
                return view('frontend.not_found', [ 'message' => 'Error to create customer in Stripe']);
            }
        } else {

            $subscription = $this->upgradeMemberhsip($request->profile_id, $membership_request->product_id);

            if($subscription) {
                // Redirect to profile
                return redirect('/profile-about/'.$profile->slug)->with('success', 'Membership upgraded successfully');
            } else {
                return view('frontend.not_found', [ 'message' => 'Error upgrading membership']);
            }
        }
    }

    public function savePaymentDB($profile, $membership)
    {
        // Save payment info
        $payment_info = array(
            'profile_id' => $profile->id,
            'membership_id' => $membership->id,
            'method' => 'Stripe',
            'status' => 'Completed',
            'amount' => $membership->price,
            'description' => 'UPGRADE',
            'product' => $membership->name,
            'interval' => $membership->interval_membership,
            'start_date' => Carbon::now(),
            'end_date' => $membership->interval_membership == 'month' ? Carbon::now()->addMonth() : Carbon::now()->addYear(),
        );

        $payment = Payment::create($payment_info);

        return $payment;
    }

    public function sendMailUpgradeUser($id_profile)
    {
        $url = 'https://api.sendgrid.com/';

        $subject = 'Your membership has been upgraded';

        $pass = env('MAIL_PASSWORD');

        $profile = Profile::find($id_profile);

        $membership = Membership::find($profile->membership_id);

        $data = array(
            'f_name' => $profile->f_name,
            'l_name' => $profile->l_name,
            'email' => $profile->qb_email,
            'username' => $profile->username,
            'membership' => $membership->name,
            'subject' => $subject,
        );

        $params = array(
            'to'        => $profile->qb_email,
            'toname'    => $profile->f_name . ' ' . $profile->l_name,
            'from'      => 'hello@wrmag.com',
            'fromname'  => 'Quarterback Magazine',
            'subject'   => $subject,
            'html'      => view('emails.upgrade_membership', $data)->render(),
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

    public function upgradeMembershipPost(Request $request, $id)
    {
        $profile = Profile::find($id);

        $membership = Membership::find($request->membership_upgrade_id);

        if(!$profile) {
            return view('frontend.not_found');
        }

        if($request->is_paid) {

            $upgraded = $this->upgradeMemberhsip($id, $membership->product_id);

            if($upgraded) {
                $this->sendMailUpgradeUser($id);
                return redirect()->back()->with('success', 'Your membership has been upgraded!');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }

        } else {
            if($profile->stripe_customer_id) {

                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $customer = \Stripe\Customer::retrieve($profile->stripe_customer_id);
                $customer->delete();
                $profile->stripe_customer_id = null;
                $profile->save();
            }
            $membership_upgrade_id = $request->membership_upgrade_id;
            $profile->membership_id = $membership_upgrade_id;
            $updated = $profile->save();
            if($updated) {
                return redirect()->back()->with('success', 'Membership updated successfully');
            } else {
                return redirect()->back()->with('error', 'Error updating membership');
            }
        }

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

    public function generateAndSaveSlugs()
    {
        $profiles = Profile::all();
        foreach ($profiles as $profile) {
            $profile->slug = $this->getSlug($profile->f_name, $profile->l_name);
            $profile->save();
        }
    }

    //Revisar cada hora si los pagos son correctos, sino, cancelar la suscripcion
    public function checkMemberships()
    {   
        $profiles = [];
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $subscriptions_past_due = Stripe\Subscription::all(array(
            "limit" => 100,
            "status" => "active",
        ));

        foreach ($subscriptions_past_due->data as $subscription) {
            $profile = Profile::where('stripe_customer_id', $subscription->customer)->first();
            if($profile) {
                $profiles [] = $profile;
                /* $profile->payment_expired = 1;
                $this->sendMailPaymentExpired($profile->id);
                $profile->save(); */
            }
            
        }

        return $profiles;
    }

    //Función para notificarle al usuario que su suscripción ha expirado y que debe actualizarla
    public function subscriptionExpiredMail($id)
    {
        $profile = Profile::find($id);
        $data = array(
            'id' => $profile->id,
            'f_name' => $profile->f_name,
            'l_name' => $profile->l_name,
            'email' => $profile->qb_email,
            'subject' => 'Hi, ' . $profile->f_name . ' ' . $profile->l_name . ' Your subscription has expired! Please upgrade your membership.',
        );
        $url = 'https://api.sendgrid.com/';
        $pass = env('MAIL_PASSWORD');
        $params = array(
            'to'        => $data['email'],
            'toname'    => $data['f_name'] . ' ' . $data['l_name'],
            'from'      => "info@wrmag.com",
            'fromname'  => 'Quarterback Magazine',
            'subject'   => 'Upgrade your membership',
            'html'      => view('emails.subscription_expired', $data)->render(),
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

    public function upgradeDataPayment($id)
    {
        $profile = Profile::find($id);

        //Search profile in stripe
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::retrieve($profile->stripe_customer_id);

        // return $customer;

        return view('frontend.upgrade_data_payment', [
            'profile' => $profile, 
            'customer' => $customer,
            'membership' => $profile->membership
        ]);
    }

    public function upgradeDataPaymentPost(Request $request)
    {
        //Update Payment Data in Stripe
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::retrieve($request->customer_id);
    }
}