<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\TrainingCenters;
use App\Models\Courses;

class CourseController extends Controller
{
    // Muestra la lista de cursos
    public function index()
    {
        $courses = Courses::all();
        return view('course.index', compact('courses'));
    }

    // Muestra el formulario de registro
    public function create()
    {
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
        return view('course.create', compact('areas', 'training_centers'));
    } 

    // Guarda el curso en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'course_number' => 'required',
            'day' => 'required',
            'area_id' => 'required',
            'training_center_id' => 'required',
        ]);

        Courses::create($request->all());

        return redirect()->route('course.index')->with('success', 'Curso registrado con éxito.');
    }

    // Muestra el formulario de edición
    public function edit(int $id)
    {
        $course = Courses::findOrFail($id);
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
        return view('course.edit', compact('course', 'areas', 'training_centers'));
    }

    // Actualiza el curso
    public function update(Request $request, int $id)
    {
        $course = Courses::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('course.index')->with('success', 'Curso actualizado con éxito.');
    }

    // Elimina el curso
    public function destroy(int $id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Curso eliminado con éxito.');
    }
}