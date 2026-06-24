<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentices;
use App\Models\Courses;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    public function registro(){
        $courses = Courses::all(); 
        $computers = Computer::all();
        return view('aprendiz.registro', compact('courses', 'computers'));
    }
    
    public function dato(Request $request){
        Apprentices::create($request->all());
    }
}
