<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Seccion;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('seccion')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $secciones = Seccion::all();
        return view('alumnos.create', compact('secciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:alumnos',
            'fecha_ingreso' => 'required|date',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'localidad' => 'required|string|max:255',
            'matricula' => 'required|string|max:50|unique:alumnos',
            'seccion_id' => 'required|exists:secciones,id',
            'valor_cuota' => 'required|numeric',
            'bonificacion' => 'required|numeric',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
    }

    public function edit(Alumno $alumno)
    {
        $secciones = Seccion::all();
        return view('alumnos.edit', compact('alumno', 'secciones'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:alumnos,dni,' . $alumno->id,
            'fecha_ingreso' => 'required|date',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'localidad' => 'required|string|max:255',
            'matricula' => 'required|string|max:50|unique:alumnos,matricula,' . $alumno->id,
            'seccion_id' => 'required|exists:secciones,id',
            'valor_cuota' => 'required|numeric',
            'bonificacion' => 'required|numeric',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }
}
