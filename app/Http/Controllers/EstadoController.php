<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::all();
        return view('estados.index', compact('estados'));
    }

    public function show($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estados.show', compact('estado'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $estado = Estado::create($request->all());
        return redirect()->route('estados.show', $estado->id);
    }

    public function edit($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::findOrFail($id);
        $estado->update($request->all());
        return redirect()->route('estados.show', $estado->id);
    }

    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();
        return redirect()->route('estados.index');
    }
}
