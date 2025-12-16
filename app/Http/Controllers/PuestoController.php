<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;

class PuestoController extends Controller
{
    public function index()
    {
        $puestos = Puesto::all();
        return view('puestos.index', compact('puestos'));
    }

    public function create()
    {
        return view('puestos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:puestos',
        ]);

        Puesto::create($request->all());

        return redirect()->route('puestos.index')->with('success', 'Puesto creado exitosamente.');
    }

    public function edit(Puesto $puesto)
    {
        return view('puestos.edit', compact('puesto'));
    }

    public function update(Request $request, Puesto $puesto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:puestos,nombre,' . $puesto->id,
        ]);

        $puesto->update($request->all());

        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado exitosamente.');
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado exitosamente.');
    }
}
