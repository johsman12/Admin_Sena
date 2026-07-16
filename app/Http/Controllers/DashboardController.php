<?php

namespace App\Http\Controllers;

// Importa los nombres tal cual aparecen en tu carpeta Models
use App\Models\Apprentices;
use App\Models\Teachers;
use App\Models\Courses;
use App\Models\Computer;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            // Usa los nombres de clase correctos aquí también
            'totalAprendices' => Apprentices::count(),
            'totalInstructores' => Teachers::count(),
            'totalCursos' => Courses::count(),
            'totalEquipos' => Computer::count(),
        ];
        
        return view('welcome', $data);
    }
}