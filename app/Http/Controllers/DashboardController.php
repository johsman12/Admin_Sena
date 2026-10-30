<?php

namespace App\Http\Controllers;

use App\Models\Apprentices;
use App\Models\Teachers;
use App\Models\Courses;
use App\Models\Computer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtenemos el usuario autenticado actualmente
        $user = auth()->user();

        // Verificamos si el correo del usuario actual coincide con algún registro en la tabla de aprendices
        // (Asumiendo que el modelo Apprentices tiene un campo 'email')
        $aprendizInfo = null;
        if ($user) {
            $aprendizInfo = Apprentices::where('email', $user->email)->first();
        }

        // Si se encuentra en la tabla de aprendices, cargamos la vista o datos de aprendiz
        if ($aprendizInfo) {
            $data = [
                'esAprendiz' => true,
                'aprendizInfo' => $aprendizInfo,
            ];
            
            return view('welcome', $data);
        }

        // Si no es aprendiz (es administrador u otro rol global), mostramos las estadísticas generales
        $data = [
            'esAprendiz' => false,
            'totalAprendices' => Apprentices::count(),
            'totalInstructores' => Teachers::count(),
            'totalCursos' => Courses::count(),
            'totalEquipos' => Computer::count(),
        ];
        
        return view('welcome', $data);
    }
}