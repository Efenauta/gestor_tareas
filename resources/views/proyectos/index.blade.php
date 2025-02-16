@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Proyectos</h1>
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Proyecto</a>
        <hr>
        <ul>
            @foreach ($proyectos as $proyecto)
                <li>
                    <a href="{{ route('proyectos.show', $proyecto) }}">{{ $proyecto->nombre }}</a> - 
                    <span>{{ $proyecto->tareas()->where('finalizada', false)->count() }} tareas por finalizar</span>
                </li>
            @endforeach
        </ul>
        {{ $proyectos->links() }}
    </div>
@endsection
