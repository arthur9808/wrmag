<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.faqs.index',[
            'faqs' => Faqs::all()
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
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq_info = $request->except('_token');
        $insert = Faqs::create($faq_info);

        if($insert){
            return redirect()->route('faqs.index')->with('success','FAQs Created Successfully');
        }else{
            return redirect()->route('faqs.index')->with('error','FAQs Created Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit($faqs)
    {
        //
        return view('admin.faqs.edit', [
            'faqs' => Faqs::find($faqs)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $faq_info = $request->except(['_token','_method', 'files']);

        $update = Faqs::where('id', $id)->update($faq_info);

        if($update){
            return redirect()->route('faqs.index')->with('success','FAQs Updated Successfully');
        }else{
            return redirect()->route('faqs.index')->with('error','FAQs Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Faqs::find($id)->delete();

        if($delete){
            return redirect()->route('faqs.index')->with('success','FAQs Deleted Successfully');
        }else{
            return redirect()->route('faqs.index')->with('error','FAQs Deleted Failed');
        }
    }
}
