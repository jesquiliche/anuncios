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
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|unique:categorias',
        'descripcion' => 'required',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Crear una nueva instancia de la clase Categoria
    $categoria = new Categoria();

    // Asignar los valores del formulario a las propiedades de la instancia
    $categoria->nombre = $request->nombre;
    $categoria->descripcion = $request->descripcion;

    // Subir y guardar la imagen si se proporciona en el formulario
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
        $imagen->move(public_path('images'), $imagenNombre);
        $categoria->imagen = '/images/'.$imagenNombre;
    }

    // Guardar la instancia de Categoria en la base de datos
    $categoria->save();

    // Redireccionar a la página de índice de categorías con un mensaje de éxito
    return redirect()->route('admin.categoria.index')->with('success', 'Categoría agregada correctamente');
}

    public function edit($id){
        $categoria=Categoria::find($id);
        return view('admin.categorias.edit',compact('categoria'));
    }
    public function update(Request $request,$id)
    {
        // Validamos los campos de la petición
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Buscar la categoría que deseamos actualizar
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
    
        // Si hemos seleccionado un fichero de imagen para subir
        if ($request->hasFile('imagen')) {
            // Recuperamos el fichero subido
            $imagen = $request->file('imagen');
            // Recuperamos el nombre del fichero y le añadimos al principio
            // la hora
            $imagenNombre = time() . '_' . $imagen->getClientOriginalName();
            // Movemos el fichero a la carpeta public/images
            $imagen->move(public_path('images'), $imagenNombre);
            // Guardamos en el campo imagen de la categoria la ruta
            $categoria->imagen = '/images/'.$imagenNombre;
        }
    
        // Guardamos en la base de datos los cambios efectuados
        $categoria->save();
    
        // Volvemos a la lista de categorias y mostramos
        // un mensaje de éxito en la vista a traves de la sesión
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