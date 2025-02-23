<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function asignarTrabajador(Tarea $tarea, $name, Request $request)
    {
        // Obtener el trabajador seleccionado
        $trabajador = Trabajador::find($request->trabajador_id);

        // Contar cuántas tareas tiene asignadas el trabajador a través de la tabla pivote
        $trabajoCount = $trabajador->tareas()->count();

        // Validar si el trabajador ya tiene 5 tareas asignadas
        if ($trabajoCount >= 5) {
            return back()->with('error', 'El trabajador ya tiene 5 tareas asignadas.');
        }

        // Asignar el trabajador a la tarea
        $tarea->trabajadores()->attach($trabajador->id);

        // Redirigir con mensaje de éxito
        return back()->with('success', 'Trabajador asignado correctamente a la tarea.');
    }
}
