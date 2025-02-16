@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Tareas</h1>
        <hr>
        <ul>
            @foreach ($tareas as $tarea)
                <li>
                    <a href="{{ route('tareas.show', $tarea) }}">{{ $tarea->nombre }}</a> - 
                    <span>{{ $tarea->finalizada ? 'Finalizada' : 'Pendiente' }}</span>
                </li>
            @endforeach
        </ul>
        {{ $tareas->links() }}
    </div>
@endsection
