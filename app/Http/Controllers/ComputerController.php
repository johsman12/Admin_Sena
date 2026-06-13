<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Computer; 

class ComputerController extends Controller
{
    public function create()
    {
        return view('computer.create'); 
    }

    public function store(Request $request)
    {
        // Ajuste estos campos segun las columnas de laa migracion "create_computers_table"
        $request->validate([
            'brand' => 'required|string',
            'serial_number' => 'required|unique:computers,serial_number',
        ]);

        Computer::create([
            'brand' => $request->brand,
            'serial_number' => $request->serial_number,
        ]);

        return redirect()->route('computer.create')->with('success', 'Computador registrado con éxito.');
    }
}