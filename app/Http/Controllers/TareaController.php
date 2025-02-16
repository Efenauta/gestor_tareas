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
        return view('tareas.show', compact('tarea'));
    }

    public function create(Proyecto $proyecto)
    {
        // Pasamos el objeto del proyecto a la vista
        return view('tareas.create', compact('proyecto'));
    }

    public function store(Request $request, Proyecto $proyecto)
    {
        // Validación de los campos si es necesario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'finalizada' => 'boolean',
        ]);

        // Crear la tarea asociada al proyecto
        $tarea = $proyecto->tareas()->create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'finalizada' => $request->has('finalizada'),
            'proyecto_id' => $proyecto->id,  // Asociamos la tarea al proyecto
        ]);

        // Redirigir al proyecto donde se creó la tarea
        return redirect()->route('proyectos.show', $proyecto);
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $tarea->update($request->all());
        return redirect()->route('tareas.show', $tarea);
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('proyectos.show', $tarea->proyecto);
    }
}
