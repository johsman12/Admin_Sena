<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('areas/create',[AreaController::class,'create'])->name('area.create');
Route::post('areas/store',[AreaController::class,'salida'])->name('area.store');
Route::get('trainingcenter/registrar',[TrainingCenterController::class,'create'])->name('training_center.create');
Route::post('/trainingcenter/salidas', [TrainingCenterController::class, 'store'])->name('training_center.salidas');
Route::get('computer/computador',[ComputerController::class,'marca'])->name('computer.create');
Route::post('computer/model',[ComputerController::class,'model'])->name('computer.store');
Route::get('teacher/registro',[TeacherController::class,'registro'])->name('teacher.create');
Route::post('teacher/admin',[TeacherController::class,'dato'])->name('teacher.admin');
Route::get('course/registro',[CourseController::class,'registro'])->name('course.registro');
Route::post('course/admin',[CourseController::class,'dato'])->name('course.peticion');
Route::get('apprentice/registro',[ApprenticeController::class,'registro'])->name('apprentice.create');
Route::post('apprentice/admin',[ApprenticeController::class,'dato'])->name('apprentice.completado');