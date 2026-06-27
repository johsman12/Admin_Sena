<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\TrainingCenters;
use App\Models\Courses;

class CourseController extends Controller{
    public function registro(){
        $areas=Areas::all();
        $training_centers=TrainingCenters::all();
       return view('course.create', compact('areas', 'training_centers'));
    } 
    public function dato(Request $request){
        Courses::create($request->all());
    }
}