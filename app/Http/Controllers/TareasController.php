<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function asignarTrabajador(Tarea $tarea, Trabajador $trabajador)
    {
        // Verificar si el trabajador ya tiene 5 tareas asignadas
        $trabajoCount = $trabajador->tareas()->count();

        if ($trabajoCount >= 5) {
            // Si el trabajador ya tiene 5 tareas, redirige de vuelta con un mensaje de error
            return back()->with('error', 'El trabajador ya tiene 5 tareas asignadas.');
        }

        // Si tiene menos de 5 tareas, se le asigna la nueva tarea
        $tarea->trabajadores()->attach($trabajador->id);

        // Redirigir de vuelta con éxito
        return back()->with('success', 'Trabajador asignado a la tarea correctamente.');
    }
}
