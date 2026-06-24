<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Computer; 

class ComputerController extends Controller
{
    public function marca(){
        return view('computer.create');
    }
    public function model(Request $request){
        Computer::create($request->all());
    }
}