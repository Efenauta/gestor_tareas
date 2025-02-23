@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">{{ $tarea->nombre }}</h1>
        <p>{{ $tarea->descripcion }}</p>
        <hr>
        <span>{{ $tarea->finalizada ? 'Finalizada' : 'Pendiente' }}</span>
        <a href="{{ route('tareas.modify', [$tarea, $tarea->nombre]) }}" class="btn btn-secondary">Editar</a>
        <form action="{{ route('tareas.destroy', [$tarea, $tarea->nombre]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection
