<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Computer; 

class ComputerController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function marca()
    {
        return view('computer.create');
    }

    /**
     * Procesa los datos del formulario y guarda en la base de datos.
     */
    public function model(Request $request)
    {
        // 1. Validamos que los datos lleguen obligatoriamente
        
        $request->validate([
            'number' => 'required|numeric',
            'brand'  => 'required|string|max:255',
        ]);

        // 2. Intentamos guardar la información
        try {
            Computer::create([
                'number' => $request->input('number'),
                'brand'  => $request->input('brand'),
            ]);

            // 3. Redirigimos de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', '¡Computador registrado exitosamente!');
            
        } catch (\Exception $e) {
            // Si hay un error de base de datos, lo capturamos aquí
            return redirect()->back()->withErrors(['error' => 'No se pudo guardar en la base de datos: ' . $e->getMessage()]);
        }
    }
}