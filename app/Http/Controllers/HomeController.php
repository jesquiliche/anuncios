<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Anuncio;
use App\Models\Estado;
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

    $estados=Estado::all();

    $categorias=Categoria::all();
    return view('anuncios.index', compact('anuncios','categorias','estados','poblacion','titulo','subcategoriaId'));

    }

    public function anunciosFilterMultiple(Request $request){
        $poblacion=$request->input('poblacion');
        $titulo=$request->input('titulo');
        $subcategoriaId=$request->input('subcategoria_id');
        $estadoId=$request->input('estado_id');
        $desde=$request->input('desde');
        $hasta=$request->input('hasta');

        $anuncios = Anuncio::select('subcategorias.nombre as subcategoria_nombre', 'poblaciones.nombre as poblacion_nombre', 'estados.nombre as estado_nombre', 'anuncios.*')
        ->join('subcategorias', 'anuncios.subcategoria_id', '=', 'subcategorias.id')
        ->join('poblaciones', 'anuncios.cod_postal', '=', 'poblaciones.codigo')
        ->join('estados', 'anuncios.estado_id', '=', 'estados.id')
        ->where('poblaciones.nombre', 'like', $poblacion.'%')
        ->where('anuncios.titulo', 'like', '%'.$titulo.'%')
        ->where('estados.id', '=', $estadoId)
        ->where('subcategorias.id', '=', $subcategoriaId)
        ->whereBetween('precio', [$desde, $hasta])
        ->get();
    
        $categorias=Categoria::all();
        $estados=Estado::all();
        return view('anuncios.index', compact('anuncios','categorias','estados','poblacion','titulo','subcategoriaId','desde','hasta'));
    

    }
}
