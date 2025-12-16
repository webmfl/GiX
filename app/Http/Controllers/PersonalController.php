<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Puesto;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::with('puesto')->get();
        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        $puestos = Puesto::all();
        return view('personal.create', compact('puestos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'sueldo' => 'required|numeric',
            'puesto_id' => 'required|exists:puestos,id',
        ]);

        Personal::create($request->all());

        return redirect()->route('personal.index')->with('success', 'Personal creado exitosamente.');
    }

    public function edit(Personal $personal)
    {
        $puestos = Puesto::all();
        return view('personal.edit', compact('personal', 'puestos'));
    }

    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'sueldo' => 'required|numeric',
            'puesto_id' => 'required|exists:puestos,id',
        ]);

        $personal->update($request->all());

        return redirect()->route('personal.index')->with('success', 'Personal actualizado exitosamente.');
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index')->with('success', 'Personal eliminado exitosamente.');
    }
}
