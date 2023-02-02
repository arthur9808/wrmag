<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.universities.index',[
            'universities' => University::all()
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
        return view('admin.universities.create',[
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
        $universityInfo = $request->except('_token');

        if($request->hasFile('logo')) {
            $universityInfo['logo'] = $request->file('logo')->store('universities', 'public');
        }
        $created = University::create($universityInfo);

        if($created) {
            return redirect()->route('universities.index')->with('success', 'University created successfully');
        } else {
            return redirect()->route('universities.index')->with('error', 'Error creating university');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return University::find($id);
        return view('admin.universities.edit',[
            'university' => University::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $universityInfo = $request->except(['_token', '_method']);

        

        if($request->hasFile('logo')) {
            $university = University::findOrFail($id);

            Storage::delete('public/' . $university->ilogo);

            $universityInfo['logo'] = $request->file('logo')->store('universities', 'public');
        }

        $updated = University::where('id', $id)->update($universityInfo);
        
        if($updated) {
            return redirect()->route('universities.index')->with('success', 'University updated successfully');
        } else {
            return redirect()->route('universities.index')->with('error', 'University could not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $university = University::findOrFail($id);

        if(Storage::delete('public/'.$university->logo)) {
            
            $deleted = University::find($id)->delete();
        }

        if($deleted) {
            return redirect()->route('universities.index')->with('success', 'Coach deleted successfully');
        } else {
            return redirect()->route('universities.index')->with('error', 'Error deleting coach');
        }
    }

    public function fillUniversityTable()
    {
        //Obtenemos el txt que está en la raiz del proyecto
        $unviersities = file_get_contents(public_path('universities.txt'));


        //Ruta de la carpeta de los logos de universidades
        $files = public_path('universities_logos');

        //Obtenemos todos los archivos de la carpeta
        $files = scandir($files);

        //Retornamos los nombres de los archivos de la carpeta
        $files = array_slice($files, 2);
        $images_logos = [];
        foreach($files as $file) {
            $fileName = explode('.', $file);
            $name = $fileName[0];
            $extension = $fileName[1];
            $logo_element = array(
                'id' => $name,
                'name' => $name,
                'extension' => $extension,
                'name_complete' => $name . '.' . $extension
            );
            //Añadimos el elemento al array de imágenes
            array_push($images_logos, $logo_element);

        }

        //Ordenamos el array de imágenes por id
        usort($images_logos, function($a, $b) {
            return $a['id'] - $b['id'];
        });

        //Creamos un array vacio para guardar los datos de los archivos
        $lines = explode("\n", $unviersities);
        $storages = [];
        // Recorrer el array de líneas y el de images_logos al mismo tiempo
        // para obtener los datos de los archivos y guardarlos en el array storages
        for($i = 0; $i < count($lines); $i++) {
            $name = explode(',', $lines[$i]);
            $image = $images_logos[$i];
            /* $storage = array(
                'name' => $name,
                'logo' => $image['name_complete'],
                'logo_extension' => $image['extension']
            ); */
            //Añadimos el elemento al array de imágenes
            array_push($storages, $image);
        }

        return $storages;



        for($i = 0; $i < count($lines); $i++) {
            $university = new University();
            $university->name = $lines[$i];
            $university->logo = $files[$i];
            $university->save();
        }
    }
}
