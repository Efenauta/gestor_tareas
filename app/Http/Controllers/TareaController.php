<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::paginate(10);
        return view('tareas.index', compact('tareas'));
    }

    public function show(Tarea $tarea)
    {
        $trabajadores = Trabajador::all();
        $proyectos = Proyecto::all();
        return view('tareas.show', compact('tarea', "trabajadores", "proyectos"));
    }

    public function create(Proyecto $proyecto = null)
    {
        $trabajadores = Trabajador::all();
        $proyectos = Proyecto::all();
        // Pasamos el objeto del proyecto a la vista
        return view('tareas.create', compact('proyecto', "trabajadores", "proyectos"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'finalizada' => 'boolean',
            'id_proyecto' => 'required|exists:proyectos,id',
        ]);

        $finalizada = $request->has('finalizada') ? true : false;

        // Crear la tarea asociada al proyecto
        $tarea = Tarea::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'finalizada' => $finalizada,
            'id_proyecto' => $request->id_proyecto,
        ]);

        // Redirigir al proyecto donde se creó la tarea
        return redirect()->route('proyectos.show', $tarea->id_proyecto);
    }


    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('proyectos.show', $tarea->proyecto);
    }

    // Método para mostrar el formulario de edición de tarea
    public function modify(Tarea $tarea)
    {
        // Obtener todos los proyectos para seleccionarlos en el formulario
        $proyectos = Proyecto::all();

        return view('tareas.modify', compact('tarea', 'proyectos'));
    }

    // Método para actualizar la tarea en la base de datos
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'finalizada' => 'required|boolean',
            'id_proyecto' => 'required|exists:proyectos,id',
        ]);

        // Actualizar la tarea con los nuevos datos
        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }
}
