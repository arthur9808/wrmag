<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Membership;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Profile;
use Stripe;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.payments.index', [
            'payments' => Payment::with('profile')->get(),
        ]);
    }

    public function indexProfiles()
    {
        //
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

        return view('admin.payments.index-profiles', [
            'payments' => $payments->data,
            'free_membership' => Membership::where('name', '=', 'BEGINNER')->first(),
        ]);
    }

    public function paymentsStripe()
    {
        //
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payments = Stripe\PaymentIntent::all([
            'limit' => 100,
        ]);

        foreach ($payments->data as $payment) {
                $customer = Profile::where('stripe_customer_id', '=', $payment->charges->data[0]->customer)->first();
                if($customer) {
                    $payment->profile = $customer;
                }
        }

        return view('admin.payments.index-stripe', [
            'payments' => $payments->data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return 'test';
        // return Payment::with('profile', 'membership')->find($id);
        /* return view('admin.payments.show', [
            //Payment info with profile info and membership info
            'payment' => Payment::with('profile', 'membership')->find($id),
        ]); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function completePayment($id)
    {
        //
        $membership = Membership::find($id);
        
        return view('frontend.buy_membership', [
            'membership' => $membership
        ]);
    }

    public function completedPayment(Request $request)
    {
        //
        return $request;
        $membership = Membership::find($request->membership_id);
        $membership->status = 'completed';
        $membership->save();

        return redirect()->route('frontend.index');
    }
}
