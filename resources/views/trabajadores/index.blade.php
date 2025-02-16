@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Trabajadores</h1>
        <a href="{{ route('trabajadores.create') }}" class="btn btn-primary">Crear Trabajador</a>
        <hr>
        <ul>
            @foreach ($trabajadores as $trabajador)
                <li>
                    <a href="{{ route('trabajadores.show', $trabajador) }}">{{ $trabajador->nombre }}</a>
                    <span>{{ $trabajador->rol }}</span>
                </li>
            @endforeach
        </ul>
        {{ $trabajadores->links() }}
    </div>
@endsection