<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();

        $subcategorias = SubCategoria::query();

        // Filtrar subcategorías por categoría si se proporciona el parámetro 'categoria_id'
        if ($request->has('categoria_id')) {
            $subcategorias->where('categoria_id', (int)$request->categoria_id);
        }

        $subcategorias = $subcategorias->paginate(4);

        return view('admin.subcategorias.index', compact('subcategorias', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:subcategorias|string|max:150',
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

        return redirect()->route('admin.subcategorias.index')->with('success', 'Subcategoría agregada correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategoria = SubCategoria::find($id);

        return view('admin.subcategorias.edit', compact('subcategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $subcategoria = Subcategoria::find($id);
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;

        $subcategoria->save();

        return redirect()->route('admin.subcategorias.index')->with('success', 'Subcategoría actualizada correctamente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('admin.subcategorias.create', compact('categorias'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria = SubCategoria::find($id);

        $subcategoria->delete();

        return redirect()->route('admin.subcategorias.index')->with('success', 'Subcategoría eliminada correctamente');
    }
}

