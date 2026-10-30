<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Teachers;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teachers::all();
        return response()->json($teachers);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'cell_number' => 'required|string|max:30',
            'area_id' => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        $teachers = Teachers::create($validated);
        return response()->json($teachers, 201);
    }

    public function show($id)
    {
        $teachers = Teachers::findOrFail($id);
        return response()->json($teachers);
    }

    public function update(Request $request, $id)
    {
        $teachers = Teachers::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($teachers->getKey()),
            ],
            'cell_number' => 'sometimes|required|string|max:30',
            'area_id' => 'sometimes|required|exists:areas,id',
            'training_center_id' => 'sometimes|required|exists:training_centers,id',
        ]);
        $teachers->update($validated);
        
        return response()->json($teachers);
    }

    public function destroy($id)
    {
        $teachers = Teachers::findOrFail($id);
        $teachers->delete();
        
        return response()->json($teachers);
    }
}