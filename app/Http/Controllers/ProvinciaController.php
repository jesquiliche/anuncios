<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));
    }

    public function show($codigo)
    {
        $provincia = Provincia::findOrFail($codigo);
        return view('provincias.show', compact('provincia'));
    }

    public function create()
    {
        return view('provincias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['required', 'unique:provincias,codigo'],
            'nombre' => ['required', 'max:255'],
        ]);

        $provincias = $request->input('provincias');
        Provincia::insert($provincias);

        return redirect()->route('provincias.index')
            ->with('success', 'Provincias creadas correctamente.');
    }

    public function edit($codigo)
    {
        $provincia = Provincia::findOrFail($codigo);
        return view('provincias.edit', compact('provincia'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
        ]);

        $provincia = Provincia::findOrFail($codigo);
        $provincia->nombre = $request->input('nombre');
        $provincia->save();

        return redirect()->route('provincias.show', $provincia->codigo)
            ->with('success', 'Provincia actualizada correctamente.');
    }

    public function destroy($codigo)
    {
        $provincia = Provincia::findOrFail($codigo);
        $provincia->delete();

        return redirect()->route('provincias.index')
            ->with('success', 'Provincia eliminada correctamente.');
    }
}
