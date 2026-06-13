<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCenters; 

class TrainingCenterController extends Controller
{
    public function create()
    {
        return view('training_center.create');
    }

    public function store(Request $request)
    {
        // Ajusta los campos segUn la migracion "create_training_centers_table"
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
        ]);

        TrainingCenters::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->route('training_center.create')->with('success', 'Centro de formación creado con éxito.');
    }
}