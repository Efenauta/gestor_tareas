<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::simplePaginate(10);
        return view('proyectos.index', compact('proyectos'));
    }

    public function show(Proyecto $proyecto)
    {
        $trabajadores = Trabajador::all();

        return view('proyectos.show', compact('proyecto', 'trabajadores'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        Proyecto::create($request->all());
        return redirect()->route('proyectos.index');
    }

    // Método para asignar trabajador a la tarea
    public function asignarTrabajador(Tarea $tarea, Trabajador $trabajador)
    {
        $trabajoCount = $trabajador->tareas()->count();

        if ($trabajoCount >= 5) {
            return back()->with('error', 'El trabajador ya tiene 5 tareas asignadas.');
        }

        // Asignar el trabajador a la tarea
        $tarea->trabajadores()->attach($trabajador->id);

        return back()->with('success', 'Trabajador asignado correctamente a la tarea.');
    }

    //modificar el proyecto
    public function modify(Proyecto $proyecto)
    {
        return view('proyectos.modify', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente.');
    }

}

