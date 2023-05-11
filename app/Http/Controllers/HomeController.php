<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Anuncio;
use App\Models\Provincia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categorias = Categoria::with('subcategorias')->get();
        $anuncios=Anuncio::all()->take(6);
        return view('home',compact('categorias','anuncios'));


    }
}
