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
use Illuminate\Support\Facades\DB;




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
        $provincia=Provincia::find($anuncio->provincia);
        $poblacion=Poblacion::find($anuncio->cod_postal);
        return view('anuncios.show', compact('anuncio','provincia','poblacion'));
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
        //Validación de datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'required|image|max:2048',
            'precio' => 'required|numeric',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'provincia' => 'required|string|max:2',
            'cod_postal'=> 'required|string|max:5',
            'telefono' => 'required|string|max:255',
            'estado_id'=>'required'
        ]);

        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $anuncio = new Anuncio($request->all());
        $anuncio->user_id = $userId; // Asignar el ID del usuario al anuncio

        //Si existe imagen en el campo
        if ($request->hasFile('imagen')) {
            //Guardar imagen en el servidor
            $path = $request->file('imagen')->store('/public/images');
            $url = '/storage/images/' . basename($path);
            //Guardar imagen en la base de datos
            $anuncio->imagen = $url;
        }

        $anuncio->save();
        
        //Lamar al formulario de detalle, el cual no permite añadir varias
        //fotos al anuncio 
        return view('anuncios.showCreateFotos', compact('anuncio'));
    }

    public function edit($id)
    {
        $subcategorias = Subcategoria::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        $provincias = Provincia::all();
        $poblaciones = Poblacion::orderBy('nombre')->get();
        $anuncio = Anuncio::findOrFail($id);
        
        //Llamada al formulario de Edición de anuncios
        return view('anuncios.edit', compact('anuncio',
            'categorias','estados','provincias','poblaciones'));
    }

    public function update(Request $request, $id)
    {
        //Validar datos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            'precio' => 'nullable|numeric',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'provincia' => 'required|string|max:255',
            'telefono' => 'required|string',
        ]);

        $anuncio = Anuncio::findOrFail($id);

        $anuncio->fill($request->all());

        //Guardar la imagen en la Base de Datos por si esta ha cambiado
        if ($request->hasFile('imagen')) {
            //Borrar fisicamente la imagen anterior
            unlink(public_path($anuncio->imagen));
            $path = $request->file('imagen')->store('/public/images');
            $url = '/storage/images/' . basename($path);
            $anuncio->imagen = $url;
        }

        $anuncio->save();

        return redirect()->route('home');
    }

    public function destroy($id){
        try {
            //Comienza la transacción
            DB::transaction(function () use ($id) {
                $anuncio = Anuncio::findOrFail($id);
                
                //Iterar sobre todas las fotos opcionales
                foreach ($anuncio->fotos as $foto) {
                    //Borrar la foto físicamente
                    unlink(public_path($foto->path));
                    $foto->delete();
                }
                //Borrar la imagen principal
                unlink(public_path($anuncio->imagen));
                $anuncio->delete();
            });
            
            // Si la transacción se completa sin errores, redirecciona a la ruta deseada
            return redirect()->route('home');
        } catch (\Throwable $e) {
            
            // Manejo de errores en caso de fallo en la transacción
            return back()->withErrors(['error' => 'Se produjo un error al borrar el anuncio.']);
        }
        
    
        return redirect()->route('home');
    }
}
