<!-- resources/views/tareas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Crear Tarea</h1>
        <form action="{{ route('tareas.store', $proyecto) }}" method="POST">
            @csrf
            <div>
                <label for="nombre">Nombre de la Tarea</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" required></textarea>
            </div>
            <div>
                <label for="finalizada">¿Está Finalizada?</label>
                <input type="checkbox" name="finalizada" id="finalizada">
            </div>
            <input type="hidden" name="id_proyecto" value="{{ $proyecto->id }}">
            <button type="submit" class="btn btn-primary">Crear Tarea</button>
        </form>
    </div>
@endsection

