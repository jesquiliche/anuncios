<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();

        $subcategorias = SubCategoria::query();
        

        if ($request->has('categoria_id')) {
            $subcategorias->where('categoria_id', (int)$request->categoria_id);
        }
        $subcategorias = $subcategorias->get();
        // return $subcategorias;
        return view('admin.subcategorias.index', compact('subcategorias','categorias'));
    }

    
   
}
