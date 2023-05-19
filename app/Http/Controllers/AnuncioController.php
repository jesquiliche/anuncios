<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Subcategoria;
use App\Models\Provincia;
use App\Models\Poblacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::all();
        return view('anuncios.index', compact('anuncios'));
    }

    public function show($id)
    {
        $anuncio = Anuncio::findOrFail($id);

        return view('anuncios.show', compact('anuncio'));
    }

    public function showByCategory($id)
    {
        $anuncios = Anuncio::wwhere('subcategoria_id', $id)->get();

        return view('anuncios.showByCategory', compact('anuncios'));
    }

    public function create()
    {
        $subcategorias = Subcategoria::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        $provincias = Provincia::all();



        $poblaciones = Poblacion::orderBy('nombre')->get();
        return view('anuncios.create', compact('subcategorias', 'categorias', 'estados', 'provincias', 'poblaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'required|image|max:2048',
            'precio' => 'required|numeric',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'provincia' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'estado_id'=>'required'
        ]);

        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        $anuncio = new Anuncio($request->all());
        $anuncio->user_id = $userId; // Asignar el ID del usuario al anuncio

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('/public/images');
            $url = '/storage/images/' . basename($path);
            $anuncio->imagen = $url;
        }

        $anuncio->save();

       return view('anuncios.showCreateFotos', compact('anuncio'));
    }

    public function edit($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('anuncios.edit', compact('anuncio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            'precio' => 'nullable|numeric',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'provincia' => 'required|string|max:255',
            'codprovincia' => 'required|string|max:255',
            'telefono' => 'required|string',
        ]);

        $anuncio = Anuncio::findOrFail($id);

        $anuncio->fill($request->all());

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/images');
            $anuncio->imagen = $path;
        }

        $anuncio->save();

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();
        return redirect()->route('anuncios.index');
    }
}
