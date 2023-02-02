<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Stripe;
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.memberships.index');

        return view('admin.memberships.index', [
            'memberships' => membership::all()
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
        $benefits = Benefit::all();
        

        return view('admin.memberships.create', [
            'benefits' => $benefits,
        ]);
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
        $membership_info = $request->except('_token');

        if(!isset($membership_info['popular'])) {
            $membership_info['popular'] = 0;
        } else {
            $membership_info['popular'] = 1;
        }
            
        if(strpos($membership_info['name'], ' ') !== false || strpos($membership_info['name'], '-') !== false || strpos($membership_info['name'], '_') !== false) {
            $stripe_name = str_replace(' ', '', $membership_info['name']);
            $stripe_name = str_replace('-', '', $stripe_name);
            $stripe_name = str_replace('_', '', $stripe_name);
        } else {
            $stripe_name = $membership_info['name'];
        }


        // $plan_name = strtoupper($stripe_name);

        // Create a random plan ID
        $plan_id = strtoupper(str_random(10));
        $membership_info['interval_membership'] = 'month';
        $membership_info['product_id'] = $plan_id;


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $save_stripe = Stripe\Plan::create([
            "amount" => $membership_info['price'] * 100,
            "interval" => $membership_info['interval_membership'],
            "product" => [
                "name" => $stripe_name,
                "statement_descriptor" => $membership_info['name'],
                "metadata" => [
                    "description" => $membership_info['description']
                ]
            ],
            "currency" => "usd",
            "id" => $plan_id
        ]);

        if($save_stripe) {

            $membership = Membership::create($membership_info);
            $membership->benefits()->attach($request->input('benefits'));
            $created = true;

        } else {
            return redirect()->back()->with('error', 'Error creating membership');
        }

        if($created) {
            return redirect()->route('memberships.index')->with('success', 'Membership created successfully');
        } else {
            return redirect()->back()->with('error', 'Error creating membership');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //Send membership benefits from relationship
        return view('admin.memberships.edit', [
            'membership' => $membership->load('benefits'),
            'benefits' => Benefit::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Only update benefits of membership
        $benefits  = $request->input('benefits');

        $all_membership = Membership::find($id);

        //Update all benefits for membership (detach all and attach new)
        $all_membership->benefits()->detach();
        $all_membership->benefits()->attach($benefits);

        $membership_info = $request->except(['_token', '_method']);
        if($request->input('popular') == 1) {
            $updated = $all_membership->update($membership_info);
        } else {
            $membership_info['popular'] = 0;
            $updated = $all_membership->update($membership_info);
        }

        if($updated) {
            return redirect()->route('memberships.index')->with('success', 'Membership updated successfully');
        } else {
            return redirect()->back()->with('error', 'Error updating membership');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);

        $stripe_name = strtoupper($membership->stripe_name);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $delete_stripe = Stripe\Plan::retrieve($stripe_name);
        $deleted = $delete_stripe->delete();

        if($deleted) {
            $membership->benefits()->detach();
            $membership->delete();
        } else {
            return 'Error con stripe';
        }

        return redirect()->route('memberships.index');
    }
}
