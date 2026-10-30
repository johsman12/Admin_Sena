<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentices;

class ApprenticeController extends Controller
{
    // Listar todas las áreas (GET)
    public function index()
    {
        $apprentices = Apprentices::all();
        return response()->json($apprentices);
    }

    // Guardar un nuevo aprendiz (POST)
    public function store(Request $request)
    {
        $apprentice = Apprentices::create($request->all());
        return response()->json($apprentice);
    }

    // Mostrar un aprendiz específico (GET /v1/apprentices/{id})
    public function show(int $id)
    {
        $apprentice = Apprentices::find($id);

        if (!$apprentice) {
            return response()->json(['message' => 'Aprendiz no encontrado'], 404);
        }

        return response()->json($apprentice);
    }

    // Actualizar un aprendiz (PUT/PATCH /v1/apprentices/{id})
    public function update(Request $request, $id)
    {
        $apprentice = Apprentices::find($id);

        if (!$apprentice) {
            return response()->json(['message' => 'Aprendiz no encontrado'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $apprentice->update($request->all());

        return response()->json([
            'message' => 'Aprendiz actualizado correctamente',
            'data' => $apprentice
        ]);
    }

    // Eliminar un aprendiz (DELETE /v1/apprentices/{id})
    public function destroy($id)
    {
        $apprentice = Apprentices::find($id);

        if (!$apprentice) {
            return response()->json(['message' => 'Aprendiz no encontrado'], 404);
        }

        $apprentice->delete();
        return response()->json(['message' => 'Aprendiz eliminado correctamente']);
    }
}