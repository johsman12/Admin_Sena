<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentices;
use App\Models\Courses;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    public function index()
    {
        $apprentices = Apprentices::all();
        return view('apprentice.index', compact('apprentices'));
    }

    public function create()
    {
        $courses = Courses::all(); 
        $computers = Computer::all();
        return view('apprentice.create', compact('courses', 'computers'));
    }
    
    public function store(Request $request)
    {
        // Guardado específico para mayor seguridad
        Apprentices::create([
            'name' => $request->name,
            'email' => $request->email,
            'cell_number' => $request->cell_number,
            'course_id' => $request->course_id,
            'computer_id' => $request->computer_id,
        ]);

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz registrado con éxito.');
    }

    // Método agregado para cargar la vista de edición
    public function edit(int $id)
    {
        $apprentice = Apprentices::findOrFail($id);
        $courses = Courses::all();
        $computers = Computer::all();
        
        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    // Método agregado para procesar la actualización
    public function update(Request $request, int $id)
    {
        $apprentice = Apprentices::findOrFail($id);
        
        $apprentice->update([
            'name' => $request->name,
            'email' => $request->email,
            'cell_number' => $request->cell_number,
            'course_id' => $request->course_id,
            'computer_id' => $request->computer_id,
        ]);
        
        return redirect()->route('apprentice.index')->with('success', 'Aprendiz actualizado correctamente.');
    }
}