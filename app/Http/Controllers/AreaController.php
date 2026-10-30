<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas; // Asegúrate de tener tu modelo importado


class AreaController extends Controller
{
    // Listar todas las áreas (GET)
    public function index()
    {
        $areas = Areas::all();
        return response()->json($areas);
    }

    // Guardar una nueva área (POST)
    public function store(Request $request)
    {
        $areas = Areas::create($request->all());
        return response()->json($areas);
    }

    // Mostrar un área específica (GET /v1/areas/{id})
    public function show(int $id)
    {
        $area = Areas::find($id);

        if (!$area) {
            return response()->json(['message' => 'Área no encontrada'], 404);
        }

        return response()->json($area);
    }

    // Actualizar un área (PUT/PATCH /v1/areas/{id})
    public function update(Request $request, $id)
    {
        $area = Areas::find($id);

        if (!$area) {
            return response()->json(['message' => 'Área no encontrada'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area->update($request->all());

        return response()->json([
            'message' => 'Área actualizada correctamente',
            'data' => $area
        ]);
    }

    // Eliminar un área (DELETE /v1/areas/{id})
    public function destroy($id)
    {
        $area = Areas::find($id);

        if (!$area) {
            return response()->json(['message' => 'Área no encontrada'], 404);
        }

        $area->delete();

        return response()->json(['message' => 'Área eliminada correctamente']);
    }
}