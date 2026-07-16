<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;

Route::get('/', function () {
    return view('welcome');
});

// --- AREAS ---
Route::get('areas/create', [AreaController::class, 'create'])->name('area.create');
Route::post('areas/store', [AreaController::class, 'store'])->name('area.store');
Route::get('areas', [AreaController::class, 'index'])->name('area.index');
Route::get('areas/{id}/edit', [AreaController::class, 'edit'])->name('area.edit');
Route::put('areas/{id}', [AreaController::class, 'update'])->name('area.update');
Route::delete('areas/{id}', [AreaController::class, 'destroy'])->name('area.destroy');

// --- CENTROS DE FORMACION ---
Route::get('trainingcenter/registrar', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::post('trainingcenter/store', [TrainingCenterController::class, 'store'])->name('training_center.store');
Route::get('trainingcenter', [TrainingCenterController::class, 'index'])->name('training_center.index');
Route::get('trainingcenter/{id}/edit', [TrainingCenterController::class, 'edit'])->name('training_center.edit');
Route::put('trainingcenter/{id}', [TrainingCenterController::class, 'update'])->name('training_center.update');
Route::delete('trainingcenter/{id}', [TrainingCenterController::class, 'destroy'])->name('training_center.destroy');

// --- COMPUTADORES ---
Route::get('computer/computador', [ComputerController::class, 'create'])->name('computer.create');
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');
Route::get('computers', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computers/{id}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computers/{id}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computers/{id}', [ComputerController::class, 'destroy'])->name('computer.destroy');

// --- INSTRUCTORES --- 
Route::get('teacher/registro', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('teachers', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teachers/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teachers/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

// --- CURSOS ---
Route::get('course/registro', [CourseController::class, 'create'])->name('course.create');
Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
Route::get('courses', [CourseController::class, 'index'])->name('course.index');
Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('courses/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

// --- APRENDICES ---
Route::get('apprentice/registro', [ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');
Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentices/{id}/edit', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentices/{id}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentices/{id}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');