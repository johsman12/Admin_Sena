<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Teachers;
use App\Models\TrainingCenters;

class TeacherController extends Controller
{
    // Muestra la lista de instructores
    public function index()
    {
        $teachers = Teachers::all();
        return view('teacher.index', compact('teachers'));
    }

    // Cambiado de 'registro' a 'create'
    public function create()
    {
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
        return view('teacher.create', compact('areas', 'training_centers'));
    }
    
    // Cambiado de 'dato' a 'store'
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'areas_id' => 'required',
            'training_center_id' => 'required',
        ]);

        Teachers::create($request->all());

        return redirect()->route('teacher.index')->with('success', 'Instructor registrado correctamente.');
    }

    // Métodos adicionales para completar el CRUD
    public function edit(int $id)
    {
        $teacher = Teachers::findOrFail($id);
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
        return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, int $id)
    {
        $teacher = Teachers::findOrFail($id);
        $teacher->update($request->all());
        return redirect()->route('teacher.index')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(int $id)
    {
        $teacher = Teachers::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Instructor eliminado correctamente.');
    }
}