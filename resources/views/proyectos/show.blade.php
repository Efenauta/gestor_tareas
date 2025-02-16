@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">{{ $proyecto->nombre }}</h1>
        <p>{{ $proyecto->descripcion }}</p>
        <a href="{{ route('tareas.create', $proyecto->id) }}" class="btn btn-primary">Añadir Tarea</a>
        <hr>
        <h2>Tareas:</h2>
        <ul>
            @foreach ($proyecto->tareas as $tarea)
                <li>
                    <a href="{{ route('tareas.show', $tarea) }}">{{ $tarea->nombre }}</a>
                    <span>{{ $tarea->finalizada ? 'Finalizada' : 'Pendiente' }}</span>
                    
                    <!-- Formulario para asignar trabajador -->
                    <form action="{{ route('tareas.asignar', ['tarea' => $tarea->id, 'trabajador' => $trabajador->id]) }}" method="POST">
                        @csrf
                        <select name="trabajador_id" id="trabajador_id">
                            @foreach ($trabajadores as $trabajador)
                                <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary">Asignar Trabajador</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

