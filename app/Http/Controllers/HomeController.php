<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(){
        $categorias = Categoria::with('subcategorias')->get();
        $anuncios=Anuncio::all()->take(6);
        return view('home',compact('categorias','anuncios'));


    }

    public function anunciosFilter(Request $request){

    $poblacion=$request->input('poblacion');
    $titulo=$request->input('titulo');
    $subcategoriaId=$request->input('subcategoria_id');
    
    $anuncios=DB::table('anuncios as A')
    ->select('S.nombre', 'P.nombre', 'A.*')
    ->join('subcategorias as S', 'A.subcategoria_id', '=', 'S.id')
    ->join('poblaciones as P', 'P.codigo', '=', 'A.cod_postal')
    ->where('P.nombre', 'like', $poblacion .'%')
    ->where('A.titulo', 'like', '%'.$titulo.'%')
    ->where('S.id', '=', $subcategoriaId)
    ->get();
    return view('anuncios.index', compact('anuncios'));

    }
}
