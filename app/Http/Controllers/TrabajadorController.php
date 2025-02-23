<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajadores = Trabajador::paginate(10);
        return view('trabajadores.index', compact('trabajadores'));
    }

    public function show(Trabajador $trabajador)
    {
        return view('trabajadores.show', compact('trabajador'));
    }

    public function create()
    {
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        Trabajador::create($request->all());
        return redirect()->route('trabajadores.index');
    }

    public function destroy(Trabajador $trabajador)
    {
        $trabajador->delete();
        return redirect()->route('trabajadores.index');
    }

    public function modify(Trabajador $trabajador)
    {
        return view('trabajadores.modify', compact('trabajador'));
    }

    // Método para actualizar el trabajador en la base de datos
    public function update(Request $request, Trabajador $trabajador)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
        ]);

        // Actualizar el trabajador con los nuevos datos
        $trabajador->update($request->all());

        return redirect()->route('trabajadores.index')->with('success', 'Trabajador actualizado correctamente.');
    }
}

