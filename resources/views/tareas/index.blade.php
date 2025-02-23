@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Tareas</h1>
        <a href="{{ route('tareas.createNP') }}" class="btn btn-primary">Crear Tarea</a>
        <hr>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Trabajadores</th>
            </tr>
            @foreach ($tareas as $tarea)
                <tr>
                    <td><a href="{{ route('tareas.show', $tarea) }}">{{ $tarea->nombre }}</a></td> 
                    <td>{{ $tarea->finalizada ? 'Finalizada' : 'Pendiente' }}</td>
                    <td>
                    <td>
                        @foreach ($tarea->trabajadores as $trabajador)
                            {{ $trabajador->nombre }}
                            @if (!$loop->last), @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $tareas->links() }}
    </div>
@endsection
