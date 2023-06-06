<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $categorias = Categoria::paginate(4);

        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $imagenNombre);
            $categoria->imagen = '/images/'.$imagenNombre;
        }
    
        $categoria->save();
    
        return redirect()->route('admin.categoria.index')->with('success', 'Categoría agregada correctamente');
    }

    public function edit($id){
        $categoria=Categoria::find($id);
        return view('admin.categorias.edit',compact('categoria'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $imagenNombre);
            $categoria->imagen = '/images/'.$imagenNombre;
        }
    
        $categoria->save();
    
        return redirect()->route('admin.categoria.index')->with('success', 'Categoría agregada correctamente');
    }
    
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
    
        if (!$categoria) {
            return redirect()->route('admin.categoria.index')->with('error', 'Categoría no encontrada');
        }
    
        // Eliminar la imagen asociada si existe
        /*
        if ($categoria->imagen) {
            // Obtener la ruta completa de la imagen
            $imagenPath = public_path($categoria->imagen);
    
            // Verificar si la imagen existe en el servidor
            if (file_exists($imagenPath)) {
                // Eliminar la imagen
                unlink($imagenPath);
            }
        }*/
    
        $categoria->delete();
    
        return redirect()->route('admin.categoria.index')->with('success', 'Categoría eliminada correctamente');
    }
    
    
}