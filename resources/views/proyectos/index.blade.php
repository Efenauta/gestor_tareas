@extends('layouts.app')

@section('content')
<style>
    table {
        width:100%;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
    <div class="container">
        <h1 class="text-xl font-bold">Proyectos</h1>
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Proyecto</a>
        <hr>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Tareas Finalizadas</th>
            </tr>
            @foreach ($proyectos as $proyecto)
            <tr>
                    <td><a href="{{ route('proyectos.show', $proyecto) }}">{{ $proyecto->nombre }}</a></td>
            @if ($proyecto->tareas()->count() > 0)
                    @if ($proyecto->tareas()->where('finalizada', true)->count() === $proyecto->tareas()->count())
                    <td style="color: black; background-color: green;">COMPLETADAS: <strong>{{ $proyecto->tareas()->where('finalizada', true)->count() }}/{{ $proyecto->tareas()->count() }}</strong></td>
                    @else
                    <td style="background-color: orange; color: red;"><strong>{{ $proyecto->tareas()->where('finalizada', true)->count() }}/{{ $proyecto->tareas()->count() }}</strong>
                    </td>
                    @endif
            @else
                <td style="color: black; background-color: pink;">NO HAY TAREAS ASOCIADAS A ESTE PROYECTO</td>
            @endif
            </tr>
            @endforeach
        </table>
        <br>
        {{ $proyectos->links() }}
    </div>
@endsection