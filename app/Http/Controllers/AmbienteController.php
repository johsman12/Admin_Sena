<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index()
    {
        $ambientes = Ambiente::all();
        return view('ambientes.index', compact('ambientes'));
    }

    public function create()
    {
        return view('ambientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        Ambiente::create($request->all());

        return redirect()->route('ambientes.index')->with('success', 'Ambiente creado exitosamente.');
    }

    public function edit(Ambiente $ambiente)
    {
        return view('ambientes.edit', compact('ambiente'));
    }

    public function update(Request $request, Ambiente $ambiente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        $ambiente->update($request->all());

        return redirect()->route('ambientes.index')->with('success', 'Ambiente actualizado exitosamente.');
    }

    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();

        return redirect()->route('ambientes.index')->with('success', 'Ambiente eliminado exitosamente.');
    }
}