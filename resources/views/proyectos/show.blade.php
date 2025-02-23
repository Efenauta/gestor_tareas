@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">{{ $proyecto->nombre }}</h1>
        <p>{{ $proyecto->descripcion }}</p>
        <a href="{{ route('tareas.create', [$proyecto, $proyecto->nombre]) }}" class="btn btn-primary">Añadir Tarea</a>
        <a href="{{ route('proyectos.modify', [$proyecto, $proyecto->nombre]) }}" class="btn btn-primary">Modificar</a>
        <hr>
        <h2>Tareas:</h2>
        <ul>
            @foreach ($proyecto->tareas as $tarea)
                <li>
                    <a href="{{ route('tareas.show', [$tarea, $tarea->nombre]) }}">{{ $tarea->nombre }}</a>
                    <span>{{ $tarea->finalizada ? 'Finalizada' : 'Pendiente' }}</span>
                    <!-- Formulario para asignar trabajador -->
                    @if ($trabajadores->count() > 0)
                        <form action="{{ route('tareas.asignar', [$tarea, $tarea->nombre]) }}" method="POST">
                            @csrf
                            <select name="trabajador_id" id="trabajador_id">
                                @foreach ($trabajadores as $trabajador)
                                    <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-secondary">Asignar Trabajador</button>
                        </form>
                    @else
                        <p style="color: red;">¡No hay trabajadores disponibles!</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection

