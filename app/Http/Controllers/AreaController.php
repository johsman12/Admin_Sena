<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas; 

class AreaController extends Controller
{
    public function create()
    {
        return view('area.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
        ]);

        Areas::create([
            'name' => $request->name,
        ]);

        return redirect()->route('area.create')->with('success', 'Area creada con exito.');
    }
}