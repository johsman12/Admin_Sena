<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCenters;
use Cloudinary\Cloudinary;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $trainingcenters = TrainingCenters::latest()->get();
        return response()->json($trainingcenters);
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
                'folder' => 'trainingcenters',
                'resource_type' => 'image',
            ]
        );

        $trainingcenters = TrainingCenters::create([
            'name' => $request->name,
            'location' => $request->location,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Centro creado correctamente',
            'data' => $trainingcenters,
        ], 201);
    }

    public function show(int $id)
    {
        $trainingcenters = TrainingCenters::findOrFail($id);
        return response()->json($trainingcenters);
    }

    public function update(Request $request, int $id)
    {
        $trainingcenter = TrainingCenters::findOrFail($id);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
        ];

        if ($request->hasFile('image')) {
            $result = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'admin_sena/training_centers',
                'resource_type' => 'image'
            ]);

            $data['image_url'] = $result->getSecurePath();
            $data['image_public_id'] = $result->getPublicId();
        }

        $trainingcenter->update($data);

        return response()->json([
            'message' => 'Centro de formación actualizado correctamente',
            'data' => $trainingcenter
        ]);
    }

    public function destroy(int $id)
    {
        $trainingcenter = TrainingCenters::findOrFail($id);
        $trainingcenter->delete();
        
        return response()->json([
            'message' => 'Eliminado correctamente',
            'data' => $trainingcenter
        ]);
    }
}