<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\TrabajadorController;

Route::get('/', [ProyectoController::class, 'index']);

Route::resource('proyectos', ProyectoController::class);
Route::resource('tareas', TareaController::class);
Route::resource('trabajadores', TrabajadorController::class);

//Ruta para crear tareas
Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.createNP');
Route::get('proyectos/{proyecto}/create', [TareaController::class, 'create'])->name('tareas.create');

// Ruta para asignar trabajador a una tarea
Route::post('tareas/{tarea}/asignar', [ProyectoController::class, 'asignarTrabajador'])->name('tareas.asignar');
