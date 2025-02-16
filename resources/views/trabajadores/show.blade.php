@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">{{ $trabajador->nombre }}</h1>
        <p>Rol: {{ $trabajador->rol }}</p>
        <a href="{{ route('trabajadores.edit', $trabajador) }}" class="btn btn-secondary">Editar</a>
        <form action="{{ route('trabajadores.destroy', $trabajador) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection
