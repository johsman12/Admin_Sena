<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class CourseController extends Controller
{

    public function index(){

        $courses = Courses::all();
        return response()->json($courses);
    }
    
    public function store(Request $request){

        // $course = Course::create($request->all());

        $courses = Courses::create($request->all());

        // return redirect()->route('course.index');

        return response()->json($courses);
    }

    public function show ($id){

        // $course=Course::find($id);
        // return view('course.show',compact('course'));

        $courses = Courses::findOrFail($id);
        return response()->json($courses);
    }

    public function update(Request $request, $id)
    {
        $courses = Courses::findOrFail($id);
        $courses->update($request->all());
        
        return response()->json($courses);
    }

    public function destroy($id)
    {
        $courses = Courses::findOrFail($id);
        $courses->delete();
        
        return response()->json($courses);
    }
}