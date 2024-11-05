<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Support\Facades\File;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trainers = Trainer::all();
        return view('index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            
            $trainer = new Trainer();
            $trainer->name = $request->input('name');
            $trainer->apellido = $request->input('apellido');
            //imagen
            $trainer->avatar = $name;
            $trainer->save();
            return 'Guardado';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //
       // return 'tengo que regresar el id';
       //return view("show");
       //$trainer = Trainer::find($id);
       //return $trainer;
       return view('show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        //
        //return $trainer;
        return view('edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        //
        //return $trainer;
        //return $request;
        $trainer->fill($request->except('avatar'));
        if ($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time.$file->getClientOriginalName();

            //imagen
            $trainer->avatar=$name;
            $file->move(public_path( ). '/images/', $name);
            // return redirect()->action('TrainerController@index);
            //return 'Guardado';

            //return $name;
            // code...
        }
        $trainer->save();
        return redirect('trainers/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = Trainer::find($id);
        
        if ($trainer) {
            $file_path = public_path('images/' . $trainer->avatar);

            if (File::exists($file_path)) {
                File::delete($file_path);
                echo 'File deleted successfully.';
            } else {
                echo 'File does not exist.';
            }

            if ($trainer->delete()) {
                return redirect('trainers/');
            } else {
                return 'El ' . $id . " no se pudo borrar";
            }
        }
    }
}
