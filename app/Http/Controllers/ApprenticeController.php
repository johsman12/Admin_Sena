<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentices;
use App\Models\Courses;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    // Muestra la lista de aprendices
    public function index()
    {
        $apprentices = Apprentices::all();
        return view('apprentice.index', compact('apprentices'));
    }

    // Muestra el formulario de registro (Cambiado de 'registro' a 'create')
    public function create()
    {
        $courses = Courses::all(); 
        $computers = Computer::all();
        return view('apprentice.create', compact('courses', 'computers'));
    }
    
    // Procesa los datos (Cambiado de 'dato' a 'store')
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:apprentices,email',
            'cell_number' => 'required|numeric',
            'course_id'   => 'required|exists:courses,id',
            'computer_id' => 'required|exists:computers,id',
        ]);

        Apprentices::create($request->all());

        return redirect()->route('apprentice.index')->with('success', 'Aprendiz registrado con éxito.');
    }

    // Edición
    public function edit(int $id)
    {
        $apprentice = Apprentices::findOrFail($id);
        $courses = Courses::all();
        $computers = Computer::all();
        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    // Actualización
    public function update(Request $request, int $id)
    {
        $apprentice = Apprentices::findOrFail($id);
        $apprentice->update($request->all());
        return redirect()->route('apprentice.index')->with('success', 'Aprendiz actualizado con éxito.');
    }

    // Eliminación
    public function destroy(int $id)
    {
        $apprentice = Apprentices::findOrFail($id);
        $apprentice->delete();
        return redirect()->route('apprentice.index')->with('success', 'Aprendiz eliminado con éxito.');
    }
}