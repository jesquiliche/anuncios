<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::all();
        return view('fotos.index', compact('fotos'));
    }

    public function show($id)
    {
        $foto = Foto::findOrFail($id);
        return view('fotos.show', compact('foto'));
    }

    public function create()
    {
        return view('fotos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'path' => 'required',
            'anuncio_id' => 'required|exists:anuncios,id'
        ]);

        Foto::create($data);
        return redirect()->route('fotos.index');
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        return view('fotos.edit', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'path' => 'required',
            'anuncio_id' => 'required|exists:anuncios,id'
        ]);

        $foto = Foto::findOrFail($id);
        $foto->update($data);
        return redirect()->route('fotos.show', $foto->id);
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        $foto->delete();
        return redirect()->route('fotos.index');
    }
}
