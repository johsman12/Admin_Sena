<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Computer;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalAprendices' => Apprentice::count(),
            'totalInstructores' => Teacher::count(),
            'totalCursos' => Course::count(),
            'totalEquipos' => Computer::count(),
        ];
        
        return view('welcome', $data);
    }
}