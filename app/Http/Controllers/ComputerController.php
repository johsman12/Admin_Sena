<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Computer; 

class ComputerController extends Controller
{
    // Cambiado de 'marca' a 'create'
    public function create()
    {
        return view('computer.create');
    }

    // Cambiado de 'model' a 'store'
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|numeric', 
            'brand'  => 'required|string|max:255',
        ]);

        Computer::create([
            'number' => $request->number,
            'brand'  => $request->brand,
        ]);

        return redirect()->route('computer.index')->with('success', 'Registrado exitosamente');
    }

    // --- MÉTODOS PARA EL LISTADO Y GESTIÓN ---

    public function index()
    {
        $computers = Computer::all();
        return view('computer.index', compact('computers'));
    }

    public function edit(int $id)
    {
        $computer = Computer::findOrFail($id);
        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'number' => 'required|numeric',
            'brand'  => 'required|string|max:255',
        ]);

        $computer = Computer::findOrFail($id);
        $computer->update([
            'number' => $request->number,
            'brand'  => $request->brand,
        ]);

        return redirect()->route('computer.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy(int $id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return redirect()->route('computer.index')->with('success', 'Eliminado correctamente');
    }
}