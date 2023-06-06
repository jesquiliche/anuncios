<?php

namespace App\Http\Controllers;

use App\Models\Poblacion;
use Illuminate\Http\Request;

class PoblacionController extends Controller
{
    public function index()
    {
        $poblaciones = Poblacion::all();
        return view('poblaciones.index', compact('poblaciones'));
    }
}
