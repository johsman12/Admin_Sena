<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCenters; 

class TrainingCenterController extends Controller
{
    public function index()
    {
        $centers = TrainingCenters::all();
        return view('training_center.index', compact('centers'));
    }

    public function create()
    {
        return view('training_center.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        TrainingCenters::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->route('training_center.index')->with('success', 'Centro creado con éxito.');
    }

    public function edit(int $id)
    {
        $center = TrainingCenters::findOrFail($id);
        return view('training_center.edit', compact('center'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $center = TrainingCenters::findOrFail($id);
        $center->update([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->route('training_center.index')->with('success', 'Centro actualizado.');
    }

    public function destroy(int $id)
    {
        $center = TrainingCenters::findOrFail($id);
        $center->delete();
        return redirect()->route('training_center.index')->with('success', 'Centro eliminado.');
    }
}