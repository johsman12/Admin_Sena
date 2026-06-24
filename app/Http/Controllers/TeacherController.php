<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Teachers;
use App\Models\TrainingCenters;

class TeacherController extends Controller{
    public function registro(){
        $areas=Areas::all();
        $training_centers=TrainingCenters::all();
        return view('teacher.registro',compact('areas','training_centers'));
    }
    
    public function dato(Request $request){
        Teachers::create($request->all());
    }
}