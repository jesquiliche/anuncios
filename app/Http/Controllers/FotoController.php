<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


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
        // Validar la solicitud
       $request->validate([
            'imagen' => 'required|image|max:2048',// Reemplaza las reglas de validación según tus necesidades
            'anuncio_id'=>'required'
        ]);

        // Obtener el archivo de imagen
        $imagen = $request->file('imagen');

        // Procesar y guardar la imagen
        $ruta = $imagen->store('public/images'); // Guarda la imagen en una carpeta específica, ajusta la ruta según tus necesidades
        $url = '/storage/images/' . basename($ruta);
        // Crear una nueva instancia de Foto y guardarla en la base de datos
        $foto = Foto::create([
            'path' => $url,
            'anuncio_id' => $request->anuncio_id,
        ]);
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
    $foto = Foto::find($id); // Obtener el objeto Foto por su ID
    
    if ($foto) {
        //Eliminar foto dinamicamente
        unlink(public_path($foto->path));
        $foto->delete(); // Eliminar la foto de la base de datos        
        
        
        return redirect()->back();
        
        // Realizar otras acciones o redirigir según tus necesidades
    } else {
        // La foto no existe, manejar el error o mostrar un mensaje al usuario
    }
}
}
