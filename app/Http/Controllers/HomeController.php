<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Membership;
use App\Models\Faqs;
use App\Models\Profile;
use App\Models\Payment;
use Stripe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        return view('home', [
            'coaches' => Coach::orderBy('created_at', 'desc')->take(4)->get(),
            'memberships' => Membership::orderBy('created_at', 'desc')->take(4)->get(),
            'profiles' => Profile::orderBy('created_at', 'desc')->take(4)->get(),
            'faqs' => Faqs::all(),
            'total_profiles' => Profile::count(),
            'total_coaches' => Coach::count(),
            'total_memberships' => Membership::count(),
            'total_payments' => $this->getCountStripePrpfiles()

        ]);
    }

    public function getCountStripePrpfiles()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payments = Stripe\PaymentIntent::all([
            'limit' => 10000,
            'expand' => ['data.payment_method'],
        ]);
        
        foreach ($payments->data as $payment) {
                $customer = Profile::where('stripe_customer_id', '=', $payment->customer)->first();
                if($customer) {
                    $payment->profile = $customer;
                }
        }

        $free_membership = Membership::where('name', '=', 'BEGINNER')->first();
        $counter = 0;
        foreach ($payments as $payment) {
            $invoice = false;
            if(strpos($payment->description, 'invoice') !== false) {
                $invoice = true;
            }

            if ($payment->profile && $payment->description == 'Subscription creation' || $invoice && $payment->profile->membership_id != $free_membership->id){
                $counter += 1;
            }
        }

        return $counter;
        
    }

    //Function to redirect to WordPress site from admin panel
    public function magazine()
    {
        return redirect(env('MAGAZINE_URL'));
    }

    public function homepage()
    {
        return view('admin.homepage', [
            'members' => Profile::where('active_membership', '!=', null)->get(),
        ]);
    }

    public function homepagePost(Request $request)
    {
        $profiles = $request->profiles;

        if($profiles == null) {
            return redirect()->back()->with('error', 'Please select at least one profile.');
        }

        //Actualizar a 1 los perfiles seleccionados, y 0 los demás
        foreach ($profiles as $profile) {
            $profile = Profile::find($profile);
            $profile->show_profile = 1;
            $profile->save();
        }

        $profiles_db = Profile::all();
        // Buscamos los perfiles que no están seleccionados
        foreach ($profiles_db as $profile) {
            if(!in_array($profile->id, $profiles)) {
                $profile->show_profile = 0;
                $profile->save();
            }
        }


        return redirect()->back()->with('success', 'Homepage updated successfully.');
    }

    public function changePassword()
    {
        //Get user logged in
        $user = auth()->user();

        return view('admin.profile.change_password', [
            'user' => $user,
        ]);

    }

    public function changePasswordUpdate(Request $request)
    {
        //Get user logged in
        $user = auth()->user();

        if (\Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->save();

            //Redirect to profile page
            return redirect()->route('profile.change-password')->with('success', 'Password changed successfully');
        } else {
            //Redirect to profile page
            return redirect()->route('profile.change-password')->with('error', 'Old password is incorrect');
        }
    }

    public function updateProfile()
    {
        //Get user logged in
        $user = auth()->user();

        return view('admin.profile.update_profile', [
            'user' => $user,
        ]);

    }

    public function updateProfileUpdate(Request $request)
    {
        //Get user logged in
        $user = auth()->user();

        //Update user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if ($user) {
            //Redirect to profile page
            return redirect()->route('profile.update-profile')->with('success', 'Profile updated successfully');
        } else {
            //Redirect to profile page
            return redirect()->route('profile.update-profile')->with('error', 'Profile not updated');
        }
    }
    
}
