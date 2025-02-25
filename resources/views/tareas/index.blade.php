@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Tareas</h1>
        <a href="{{ route('tareas.createNP') }}" class="btn btn-primary">Crear Tarea</a>
        <hr>
        <table style="width: 75%; border: 1px solid black; border-collapse: colapse;">
            <tr style="border: 1px solid black; border-collapse: colapse;">
                <th>Nombre</th>
                <th>Estado</th>
                <th>Trabajadores</th>
                <th>Añadir</th>
            </tr>
            @foreach ($tareas as $tarea)
                <tr>
                    <td style="border: 1px solid black; border-collapse: colapse;"><a href="{{ route('tareas.show', $tarea) }}">{{ $tarea->nombre }}</a></td> 
                    <td style="border: 1px solid black; border-collapse: colapse;">{{ $tarea->finalizada ? 'Finalizada' : 'Pendiente' }}</td>
                    <td style="border: 1px solid black; border-collapse: colapse;">
                    @foreach ($tarea->trabajadores as $trabajador)
                        {{ $trabajador->nombre }}
                        <form action="{{ route('tareas.eliminarTrabajador', ['tarea' => $tarea, 'trabajador' => $trabajador]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary" style="background-color: red; padding: 0%;">ELIMINAR</button>
                        </form>
                        <br>
                    @endforeach
                    </td>
                    <td style="border: 1px solid black; border-collapse: colapse;">
                    <!-- Formulario para asignar trabajador -->
                    @if ($trabajadores->count() > 0)
                        <form action="{{ route('tareas.asignar', [$tarea, $trabajador]) }}" method="POST">
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
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $tareas->links() }}
    </div>
@endsection
