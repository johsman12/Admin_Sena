<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use Cloudinary\Cloudinary;

class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::all();
        return response()->json($computers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'computers',
                'resource_type' => 'image',
            ]
        );

        $computer = Computer::create([
            'number' => $request->number,
            'brand' => $request->brand,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Computador creado correctamente',
            'data' => $computer,
        ], 201);
    }

    public function show(int $id)
    {
        $computer = Computer::find($id);
        if (!$computer) {
            return response()->json(['message' => 'Computador no encontrado'], 404);
        }
        return response()->json($computer);
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::find($id);

        if (!$computer) {
            return response()->json(['message' => 'Computador no encontrado'], 404);
        }

        $data = [
            'number' => $request->number,
            'brand' => $request->brand,
        ];

        if ($request->hasFile('imagen')) {
            $result = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'admin_sena/computers',
                'resource_type' => 'image'
            ]);

            $data['image_url'] = $result->getSecurePath();
            $data['image_public_id'] = $result->getPublicId();
        }

        $computer->update($data);

        return response()->json([
            'message' => 'Actualizado correctamente',
            'data' => $computer
        ]);
    }

    public function destroy($id)
    {
        $computer = Computer::find($id);

        if (!$computer) {
            return response()->json(['message' => 'Computador no encontrado'], 404);
        }

        $computer->delete();

        return response()->json(['message' => 'Eliminado correctamente']);
    }
}
