<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'cell_number' => 'required|string|max:30',
            'area_id' => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);
        $teacher = Teachers::create($validatedData);
        return response()->json($teacher, 201);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teachers::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($teacher->getKey()),
            ],
            'cell_number' => 'sometimes|required|string|max:30',
            'area_id' => 'sometimes|required|exists:areas,id',
            'training_center_id' => 'sometimes|required|exists:training_centers,id',
        ]);

        $teacher->update($validated);

        return response()->json($teacher);
    }
    public function index()
    {
        $teachers = Teachers::with([
            "area" => function ($consulta) {
                $consulta->select("id", "name");
            },
            "training_center" => function ($consulta) {
                $consulta->select("id", "name");
            }
        ])->get();
        return response()->json($teachers);
    }
}
