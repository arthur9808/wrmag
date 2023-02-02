<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* return view('admin.settings.index', [
            'settings' => Setting::all()
        ]); */
    }

    public function socialMedia()
    {
        $social_media = Setting::where('place', 'social-media')->get();
        // return $social_media;
        return view('admin.settings.social_media.index', [
            'social_media' => $social_media
        ]);
    }

    public function socialMediaEdit($id)
    {
        $social_media = Setting::find($id);

        return view('admin.settings.social_media.edit', [
            'social_media' => $social_media
        ]);
    }

    public function socialMediaUpdate(Request $request, $id)
    {
        $social_media_info = $request->except(['_token', '_method']);
        $social_media = Setting::find($id); 
        $updated = $social_media->update($social_media_info);

        if($updated) {
            return redirect()->route('settings.social-media')->with('success', 'Social Media Updated Successfully');
        } else {
            return redirect()->route('settings.social-media')->with('error', 'Social Media Updated Failed');
        }
    }

    public function contactForm()
    {
        $email = Setting::where('name', 'email')->first();

        return view('admin.settings.contact.index',[
            'settings' => $email
        ]);
    }

    public function contactFormEdit($id)
    {
        $email = Setting::where('id', $id)->first();
        
        return view('admin.settings.contact.edit',[
            'settings' => $email
        ]);
    }

    public function contactFormUpdate(Request $request, $id)
    {
        $contact_form_info = $request->except(['_token', '_method']);
        $contact_form_info['value'] = explode(',', $contact_form_info['value']);

        $contact_form = Setting::find($id);
        $updated = $contact_form->update($contact_form_info);

        if($updated) {
            return redirect()->route('settings.contact-form')->with('success', 'Contact Form Updated Successfully');
        } else {
            return redirect()->route('settings.contact-form')->with('error', 'Contact Form Updated Failed');
        }
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
