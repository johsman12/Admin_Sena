<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;

// Estas son las rutas para Centros de Formacion
Route::get('training-center/create', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::post('training-center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');

// las rutas para Computadores 
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');

// las rutas para areas 
Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
Route::post('area/store', [AreaController::class, 'store'])->name('area.store');