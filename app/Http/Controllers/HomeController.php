<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categorias = Categoria::with('subcategorias')->get();
    


        return view('home',compact('categorias'));


    }
}
