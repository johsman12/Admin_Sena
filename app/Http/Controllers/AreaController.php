<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas; 

class AreaController extends Controller
{
    // Muestra el formulario para crear una nueva área
    public function create()
    {
        return view('area.create'); 
    }

    // Guarda una nueva área en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
        ]);

        Areas::create([
            'name' => $request->name,
        ]);

        return redirect()->route('area.index')->with('success', 'Área creada con éxito.');
    }

    // Muestra el listado de áreas
    public function index()
    {
        $areas = Areas::all(); 
        return view('area.index', compact('areas')); 
    }

    // Muestra el formulario para editar un área existente
    public function edit(int $id)
    {
        $area = Areas::findOrFail($id); 
        return view('area.edit', compact('area'));
    }

    // Actualiza la información del área
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Areas::findOrFail($id);
        $area->update([
            'name' => $request->name,
        ]);

        return redirect()->route('area.index')->with('success', 'Área actualizada correctamente.');
    }

    // Elimina un área de la base de datos
    public function destroy(int $id)
    {
        $area = Areas::findOrFail($id);
        $area->delete();

        return redirect()->route('area.index')->with('success', 'Área eliminada correctamente.');
    }
}