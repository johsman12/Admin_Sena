<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentices;
use App\Models\Courses;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function registro()
    {
        // Obtenemos todos los cursos y computadores para llenar los selects
        $courses = Courses::all(); 
        $computers = Computer::all();
        
        // Retornamos la vista ubicada en resources
        return view('apprentice.create', compact('courses', 'computers'));
    }
    
    /**
     * Procesa los datos enviados desde el formulario.
     */
    public function dato(Request $request)
    {
        // 1. Validar que la información recibida sea correcta
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:apprentices,email',
            'cell_number' => 'required|numeric',
            'course_id'   => 'required|exists:courses,id',
            'computer_id' => 'required|exists:computers,id',
        ]);

        // 2. Guardar el nuevo aprendiz en la base de datos
        Apprentices::create($request->all());

        // 3. Redirigir al usuario al formulario nuevamente con un mensaje de éxito
        // Usamos el nombre de la ruta que muestra el formulario 
        return redirect()->route('apprentice.create')->with('success', 'Aprendiz registrado con éxito.');
    }
}   