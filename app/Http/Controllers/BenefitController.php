<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('admin.benefits.index');

        return view('admin.benefits.index', [
            'benefits' => Benefit::all()
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
        return view('admin.benefits.create');
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
        $benefit_info = $request->except('_token');
        $created = Benefit::create($benefit_info);

        if($created) {
            return redirect()->route('benefits.index')->with('success', 'Benefit created successfully');
        } else {
            return redirect()->route('benefits.create')->with('error', 'Error creating benefit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.benefits.edit', [
            'benefit' => Benefit::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Benefit $benefit)
    {
        //
        $benefit_info = $request->except(['_token', '_method']);

        if(!$request->has('is_shared')) {
            $benefit_info['is_shared'] = 0;
        }

        $updated = $benefit->update($benefit_info);
        
        if($updated) {
            return redirect()->route('benefits.index')->with('success', 'Benefit updated successfully');
        } else {
            return redirect()->route('benefits.index')->with('error', 'Benefit could not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefit $benefit)
    {
        //
        
        $deleted_b = \DB::table('membership_benefit')->where('benefit_id', $benefit->id)->delete();
        if($deleted_b) {
            $deleted = $benefit->delete();
        } else {
            $deleted = false;
        }  

        if($deleted) {
            return redirect()->route('benefits.index')->with('success', 'Benefit deleted successfully');
        } else {
            return redirect()->route('benefits.index')->with('error', 'Benefit could not be deleted');
        }
    }
}
