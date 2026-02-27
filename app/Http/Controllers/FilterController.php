<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* use App\Http\Controllers\ProductController; */
use App\Models\Filtro;


class FilterController extends Controller
{
    public function index(Request $request)
    {
        $query = Filtro::query();
    
        if ($request->has('filtro') && !is_null($request->input('filtro'))) {
            $filtro = $request->input('filtro');
            // Corrected variable name from $ffiltroilter to $filtro
            $query->where('filtro', 'like', "%{$filtro}%");
        }
    
        $perPage = 8500;
        // Select only 'id' and 'filtro' columns
        //$filters = $query->select('id', 'filtro')->orderBy('filtro', 'asc')->paginate($perPage);
        $filters = $query->select('filtro')->orderBy('filtro', 'asc')->paginate($perPage); //nao preciso do ID apenas os filtros
    
        return response()->json([
            'filters' => $filters->items(),
        ]);
    }
}
