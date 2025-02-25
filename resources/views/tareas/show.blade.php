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
        <br>
        <hr>
        <h2>Gestor de Trabajadores</h2>
        <br>
        @if ($trabajadores->count() > 0)
            <form action="{{ route('tareas.asignar', [$tarea, $tarea->nombre]) }}" method="POST">
                @csrf
                <select name="trabajador_id" id="trabajador_id">
                    @foreach ($trabajadores as $trabajador)
                        @if($tarea->trabajadores->count() == 0)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                        @elseif (!$tarea->trabajadores->contains($trabajador))
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit" class="btn btn-secondary">Asignar Trabajador</button>
            </form>
        @else
            <p style="color: red;">¡No hay trabajadores disponibles!</p>
        @endif
        <br>
        <table>
            <tr>
                <th>Trabajadores de la Tarea</th>
            </tr>
            @foreach ($tarea->trabajadores as $trabajador)
                <tr>
                    <td>
                        {{ $trabajador->nombre }}
                        <form action="{{ route('tareas.eliminarTrabajador', ['tarea' => $tarea, 'trabajador' => $trabajador]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary" style="background-color: red; padding: 0%;">ELIMINAR</button>
                        </form>
                        <br>
                    </td>
                </tr>
            @endforeach
        </tabel>
    </div>
@endsection
