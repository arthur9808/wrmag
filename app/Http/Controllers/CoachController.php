<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.coaches.index', [
            'coaches' => Coach::all()
        ]);
    }


    public function indexSortable()
    {
        // Cocahes order by sort_order
        $coaches = Coach::orderBy('sort_order', 'asc')->get();
        return view('admin.coaches.index-sortable', [
            'coaches' => $coaches,
        ]);
    }

    public function updateOrder(Request $request)
    {
        //
        /* $coaches = $request->input('coaches');
        foreach ($coaches as $order => $id) {
            Coach::where('id', $id)->update(['order' => $order]);
        }
        return response()->json(['success' => 'Order updated successfully.']); */

        if (request()->has('order')) {
            $sortable = request()->get('order');
            $i = 1;
            foreach ($sortable as $id) {
                $data = [
                    'sort_order' => $i,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                Coach::where('id', $id)->update($data);
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
        return view('admin.coaches.create');
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
        $coachInfo = $request->except('_token');

        $coachInfo['upcoming_camps_name']  = json_encode($coachInfo['upcoming_camps_date']);
        $coachInfo['upcoming_camps_date']  = json_encode($coachInfo['upcoming_camps_date']);
        $coachInfo['upcoming_camps_end_date']  = json_encode($coachInfo['upcoming_camps_end_date']);
        $coachInfo['upcoming_camps_location']  = json_encode($coachInfo['upcoming_camps_location']);
        $coachInfo['upcoming_camps_link']  = json_encode($coachInfo['upcoming_camps_link']);
        $coachInfo['college_nfl_qbs_trained_name']  = json_encode($coachInfo['college_nfl_qbs_trained_name']);
        $coachInfo['college_nfl_qbs_trained_college']  = json_encode($coachInfo['college_nfl_qbs_trained_college']);
        $coach['country'] = 'United States';
        $coachInfo['birthday'] = date('Y-m-d');
        // return $coachInfo;


        if($request->hasFile('image')) {
            $coachInfo['image'] = $request->file('image')->store('coaches', 'public');
        }

        // Coach Logo
        if($request->hasFile('coach_logo')) {
            $coachInfo['coach_logo'] = $request->file('coach_logo')->store('coach_logo', 'public');
        }

        //Feature Images
        if($request->hasFile('featued_images')) {
            //Recorremos el array de imagenes para guardarlas en la carpeta
            foreach($request->file('featued_images') as $image) {
                $image_name = $image->store('coaches', 'public');
                $images[] = json_encode($image_name);
            }

            $coachInfo['featued_images'] = json_encode($images);
        }
        $created = Coach::create($coachInfo);

        if($created) {
            return redirect()->route('coaches.index')->with('success', 'Coach created successfully');
        } else {
            return redirect()->route('coaches.create')->with('error', 'Error creating coach');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coachInfo = Coach::find($id);

        $upcomingCamps = array(
            'name' => json_decode($coachInfo->upcoming_camps_name) ?? [],
            'date' => json_decode($coachInfo->upcoming_camps_date) ?? [],
            'end_date' => json_decode($coachInfo->upcoming_camps_end_date) ?? [],
            'location' => json_decode($coachInfo->upcoming_camps_location) ?? [],
            'link' => json_decode($coachInfo->upcoming_camps_link) ?? [],
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
        
        // return $upconmingCamps;

        return view('admin.coaches.edit', [
            'profile' => $coachInfo,
            'upcomingCamps' => $upcomingCamps,
            'college_nfl_qbs_trained' => $college_nfl_qbs_trained,
            'featured_images' => $featured_images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $coachInfo = $request->except(['_token', '_method']);
        $coach['country'] = 'United States';

        // If not exist $coachInfo['upcoming_camps_date']
        if(!isset($coachInfo['upcoming_camps_date']) || !isset($coachInfo['upcoming_camps_end_date']) || !isset($coachInfo['upcoming_camps_location']) || !isset($coachInfo['upcoming_camps_link'])) {
            $coachInfo['upcoming_camps_date'] = json_encode([null]);
            $coachInfo['upcoming_camps_end_date'] = json_encode([null]);
            $coachInfo['upcoming_camps_location'] = json_encode([null]);
            $coachInfo['upcoming_camps_link'] = json_encode([null]);
        }

        // If not exist $coachInfo['college_nfl_qbs_trained_name']
        if(!isset($coachInfo['college_nfl_qbs_trained_name']) || !isset($coachInfo['college_nfl_qbs_trained_college'])) {
            $coachInfo['college_nfl_qbs_trained_name'] = json_encode([null]);
            $coachInfo['college_nfl_qbs_trained_college'] = json_encode([null]);
        }

        if($request->hasFile('image')) {
            $coach = Coach::findOrFail($id);

            Storage::delete('public/' . $coach->image);

            $coachInfo['image'] = $request->file('image')->store('coaches', 'public');
        }

        // Coach Logo
        if($request->hasFile('coach_logo')) {
            $coach = Coach::findOrFail($id);

            Storage::delete('public/' . $coach->coach_logo);

            $coachInfo['coach_logo'] = $request->file('coach_logo')->store('coach_logo', 'public');
        }

        //Buscamos las fotos que ya estan en la base de datos para agregarlas al array
        $coach_info_old = Coach::findOrFail($id);
        $old_photos = json_decode($coach_info_old->featued_images) ?? [];


        //Feature Images
        if($request->hasFile('featued_images')) {
            //Recorremos el array de imagenes para guardarlas en la carpeta
            foreach($request->file('featued_images') as $image) {
                $image_name = $image->store('coaches', 'public');
                $images[] = json_encode($image_name);
            }

            $new_photos = $images;
        }

        $new_photos = $new_photos ?? [];

        $coachInfo['featued_images'] = json_encode(array_merge($new_photos, $old_photos));


        $updated = Coach::where('id', $id)->update($coachInfo);
        
        if($updated) {
            return redirect()->route('coaches.index')->with('success', 'Coach updated successfully');
        } else {
            return redirect()->route('coaches.index')->with('error', 'Coach could not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coach = Coach::findOrFail($id);

        if(Storage::delete('public/'.$coach->image)) {
            
            $deleted = Coach::find($id)->delete();
        } else {
            $deleted = Coach::find($id)->delete();
        }

        if($deleted) {
            return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully');
        } else {
            return redirect()->route('coaches.index')->with('error', 'Error deleting coach');
        }
    }

    public function deleteImage($coach_id, $image)
    {
        $id = $coach_id;
        $image = 'coaches/' . $image;
        $coach = Coach::findOrFail($id);
        $featured_images = json_decode($coach->featued_images) ?? [];

        if(!empty($featured_images)) {
            $featured_images = str_replace('\\', '/', $featured_images);
            $featured_images = str_replace('//', '/', $featured_images);
            $featured_images = str_replace('"', '', $featured_images);
        }

        $featured_images = array_diff($featured_images, [$image]);

        foreach($featured_images as $featured_image) {
            $featured_images_array [] = json_encode($featured_image);
        }

        // return json_encode($featured_images_array);

        if(Storage::delete('public/'.$image)) {
            $featured_images_array = $featured_images_array ?? []; 
            $image_deleted = json_encode($featured_images_array) ? json_encode($featured_images_array) : json_encode([]);
            $deleted = Coach::where('id', $id)->update([
            'featued_images' => $image_deleted
            ]);

            if($deleted) {
                return redirect()->route('coaches.edit', $id)->with('success', 'Image deleted successfully');
            } else {
                return redirect()->route('coaches.edit', $id)->with('error', 'Error deleting image');
            }
        } 
    }

    public function searchCoaches(Request $request)
    {
        $search = $request->get('search');

        // Search Coaches by state
        $coaches = Coach::where('state', 'like', '%' . $search . '%')->get();

        return view('frontend.coaches', [
            'coaches' => $coaches,
            'states' => Coach::select('state')->distinct()->orderby('state', 'asc')->get(),
        ]);
    }
}
