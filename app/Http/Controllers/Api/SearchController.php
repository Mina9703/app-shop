<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trainer; 
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $trainers = collect(); // Lista vacía por defecto

        // Si el campo 'text' tiene contenido, se realiza la búsqueda con case-insensitive
        if ($request->has('text') && !empty($request->get('text'))) {
            $searchText = $request->get('text');
            $trainers = Trainer::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($searchText) . '%'])->get();
        } else {
            // Si no hay texto, se muestran todos los registros
            $trainers = Trainer::all();
        }

        // Manejo de respuesta según el tipo de solicitud (API o vista)
        if ($request->wantsJson()) {
            return $trainers->count() 
                ? response()->json($trainers) 
                : response()->json(['error' => 'Sin resultados, ingrese otros campos para la búsqueda.'], 404);
        }

        return view('index', compact('trainers'));
    }
}


