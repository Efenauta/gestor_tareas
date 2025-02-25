<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\TrabajadorController;

Route::get('/', [ProyectoController::class, 'index']);

Route::resource('proyectos', ProyectoController::class);
Route::resource('tareas', TareaController::class);
Route::resource('trabajadores', TrabajadorController::class);

//Ruta para modificar proyectos
Route::get('proyectos/modify/{proyecto}/{name}', [ProyectoController::class, 'modify'])->name('proyectos.modify');
Route::put('/proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');

//Ruta para crear tareas
Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.createNP');
Route::get('proyectos/{proyecto}/{name}/create', [TareaController::class, 'create'])->name('tareas.create');

//Ruta para modificar tareas
Route::get('tareas/modify/{tarea}/{name}', [TareaController::class, 'modify'])->name('tareas.modify');
Route::put('/tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');

// Ruta para asignar trabajador a una tarea
Route::post('tareas/{tarea}/{name}/asignar', [TareasController::class, 'asignarTrabajador'])->name('tareas.asignar');
Route::delete('tareas/{tarea}/{trabajador}/eliminarTrabajador', [TareasController::class, 'eliminarTrabajador'])->name('tareas.eliminarTrabajador');