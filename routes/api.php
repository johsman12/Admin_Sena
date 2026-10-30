<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('computers', [ComputerController::class,'index'])->name('api.v1.computers.index');
Route::post('computers', [ComputerController::class,'store'])->name('api.v1.computers.store');
Route::get('computers/{computer}', [ComputerController::class,'show'])->name('api.v1.computers.show');
Route::put('computers/{computer}',[ComputerController::class,'update'])->name('api.v1.computer.update');
Route::delete('computers/{computer}',[ComputerController::class,'destroy'])->name('api.v1.computer.destroy');
 // Rutas para el módulo de Áreas
Route::get('areas', [AreaController::class,'index'])->name('api.v1.areas.index');
Route::post('areas', [AreaController::class,'store'])->name('api.v1.areas.store');
Route::get('areas/{area}', [AreaController::class,'show'])->name('api.v1.areas.show');
Route::put('areas/{area}',[AreaController::class,'update'])->name('api.v1.area.update');
Route::delete('areas/{area}',[AreaController::class,'destroy'])->name('api.v1.area.destroy');
//Rutas para trainingcenters 
Route::get('trainingcenters', [TrainingCenterController::class, 'index'])->name('api.v1.trainingcenters.index');
Route::post('trainingcenters', [TrainingCenterController::class, 'store'])->name('api.v1.trainingcenters.store');
Route::get('trainingcenters/{id}', [TrainingCenterController::class, 'show'])->name('api.v1.trainingcenters.show');
Route::put('trainingcenters/{id}', [TrainingCenterController::class, 'update'])->name('api.v1.trainingcenter.update');
Route::delete('trainingcenters/{id}', [TrainingCenterController::class, 'destroy'])->name('api.v1.trainingcenter.destroy');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('api.v1.apprentices.index');
Route::post('apprentices', [ApprenticeController::class, 'store'])->name('api.v1.apprentices.store');
Route::get('apprentices/{id}', [ApprenticeController::class, 'show'])->name('api.v1.apprentices.show');
Route::put('apprentices/{id}', [ApprenticeController::class, 'update'])->name('api.v1.apprentice.update');
Route::delete('apprentices/{id}', [ApprenticeController::class, 'destroy'])->name('api.v1.apprentice.destroy');

Route::get('courses', [CourseController::class, 'index'])->name('api.v1.courses.index');
Route::post('courses', [CourseController::class, 'store'])->name('api.v1.courses.store');
Route::get('courses/{id}', [CourseController::class, 'show'])->name('api.v1.courses.show');
Route::put('courses/{id}', [CourseController::class, 'update'])->name('api.v1.course.update');
Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('api.v1.course.destroy');

Route::get('teachers', [TeacherController::class, 'index'])->name('api.v1.teachers.index');
Route::post('teachers', [TeacherController::class, 'store'])->name('api.v1.teachers.store');
Route::get('teachers/{id}', [TeacherController::class, 'show'])->name('api.v1.teachers.show');
Route::put('teachers/{id}', [TeacherController::class, 'update'])->name('api.v1.teacher.update');
Route::delete('teachers/{id}', [TeacherController::class, 'destroy'])->name('api.v1.teacher.destroy');
