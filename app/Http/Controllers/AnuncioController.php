<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('anuncios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            'precio' => 'nullable|numeric',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'provincia' => 'required|string|max:255',
            'telefono'=>'required|string|max:255',
            'codprovincia' => 'required|string|max:255',
        ]);

        $anuncio = new Anuncio($request->all());

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/images');
            $anuncio->imagen = $path;
        }

        $anuncio->save();

     //   return redirect()->route('anuncios.show', $anuncio->id);
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
            'telefono'=>'required|string',
        ]);

        $anuncio = Anuncio::findOrFail($id);

        $anuncio->fill($request->all());

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/images');
            $anuncio->imagen = $path;
        }

        $anuncio->save();

       // return redirect()->route('anuncios.show', $anuncio->id);
    }

    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();
        return redirect()->route('anuncios.index');
    }
}
