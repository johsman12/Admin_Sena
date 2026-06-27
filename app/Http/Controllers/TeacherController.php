<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Teachers;
use App\Models\TrainingCenters;

class TeacherController extends Controller
{
    public function registro()
    {
        $areas = Areas::all();
        $training_centers = TrainingCenters::all();
       
        return view('teacher.create', compact('areas', 'training_centers'));
    }
    
    public function dato(Request $request)
    {
        // 1. Validar los datos antes de guardar
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'areas_id' => 'required',
            'training_center_id' => 'required',
        ]);

        // 2. Guardar el registro
        Teachers::create($request->all());

       
        return redirect()->route('teacher.create')->with('success', 'Instructor registrado correctamente.');
    }
}