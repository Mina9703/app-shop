<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function prueba2(){
        return 'Estoy dentro de PruebaController :D';
    }

    /**
     * Show the specified resource.
     * Este método muestra el detalle de la película por su ID.
     */
    public function show()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
