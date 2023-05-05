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

    public function show($codigo)
    {
        $poblacion = Poblacion::findOrFail($codigo);
        return view('poblaciones.show', compact('poblacion'));
    }

    public function create()
    {
        return view('poblaciones.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|unique:poblaciones|numeric',
            'nombre' => 'required|string',
            'provincia_cod' => 'required|numeric'
        ]);

        $poblacion = Poblacion::create($validatedData);
        return redirect()->route('poblaciones.show', $poblacion->codigo);
    }

    public function edit($codigo)
    {
        $poblacion = Poblacion::findOrFail($codigo);
        return view('poblaciones.edit', compact('poblacion'));
    }

    public function update(Request $request, $codigo)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|unique:poblaciones,codigo,'.$codigo.'|numeric',
            'nombre' => 'required|string',
            'provincia_cod' => 'required|numeric'
        ]);

        $poblacion = Poblacion::findOrFail($codigo);
        $poblacion->update($validatedData);
        return redirect()->route('poblaciones.show', $poblacion->codigo);
    }

    public function destroy($codigo)
    {
        $poblacion = Poblacion::findOrFail($codigo);
        $poblacion->delete();
        return redirect()->route('poblaciones.index');
    }
}
