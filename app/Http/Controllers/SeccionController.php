<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Seccion;
use App\Models\Personal;

class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::with('personal')->get();
        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        $personal = Personal::all();
        return view('secciones.create', compact('personal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'turno' => 'required|in:Mañana,Tarde',
            'personal_id' => 'required|exists:personals,id',
        ]);

        Seccion::create($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección creada exitosamente.');
    }

    public function edit(Seccion $seccion) // Note: route model binding might fail if parameter name doesn't match
    {
        // Explicitly finding if binding fails or just use ID
        // Assuming standard binding: route('secciones.edit', $seccion) -> parameter is {seccione} usually in Laravel 8 resource
        // Let's use ID to be safe or check route list. Laravel usually singularizes 'secciones' to 'seccione'.
        // Let's stick to standard binding but be aware.

        $personal = Personal::all();
        return view('secciones.edit', compact('seccion', 'personal'));
    }

    // Override update to use $seccione if needed, but let's try standard first.
    // Actually, let's use the ID to avoid any "seccione" vs "seccion" confusion in resource naming.
    // But standard resource controller uses model binding.
    // Let's stick to standard.

    public function update(Request $request, Seccion $seccion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'turno' => 'required|in:Mañana,Tarde',
            'personal_id' => 'required|exists:personals,id',
        ]);

        $seccion->update($request->all());

        return redirect()->route('secciones.index')->with('success', 'Sección actualizada exitosamente.');
    }

    public function destroy(Seccion $seccion)
    {
        $seccion->delete();
        return redirect()->route('secciones.index')->with('success', 'Sección eliminada exitosamente.');
    }
}
