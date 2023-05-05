<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        return view('subcategorias.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id'
        ];

        $request->validate($rules);

        $data = $request->only([
            'nombre',
            'descripcion',
            'categoria_id'
        ]);

        Subcategoria::create($data);

        return redirect()->route('subcategorias.index');
    }

    public function edit(Subcategoria $subcategoria)
    {
        return view('subcategorias.edit', compact('subcategoria'));
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id'
        ];

        $request->validate($rules);

        $data = $request->only([
            'nombre',
            'descripcion',
            'categoria_id'
        ]);

        $subcategoria->update($data);

        return redirect()->route('subcategorias.index');
    }

    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return redirect()->route('subcategorias.index');
    }
}
