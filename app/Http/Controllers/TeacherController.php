<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Teachers;
use App\Models\TrainingCenters;
use App\Models\Courses;
use App\Models\Computer;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teachers::all();
        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
        $courses = Courses::all();
        $computers = Computer::all();
        
        return view('teacher.create', compact('areas', 'training_centers', 'courses', 'computers'));
    }
    
    public function store(Request $request)
    {
        Teachers::create($request->all());
        return redirect()->route('teacher.index')->with('success', 'Instructor registrado correctamente.');
    }

    public function edit(int $id)
    {
        $teacher = Teachers::findOrFail($id);
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
        $courses = Courses::all();
        $computers = Computer::all();
        
        return view('teacher.edit', compact('teacher', 'areas', 'training_centers', 'courses', 'computers'));
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