@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Crear Trabajador</h1>
        <form action="{{ route('trabajadores.store') }}" method="POST">
            @csrf
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="rol">Rol</label>
                <input type="text" name="rol" id="rol" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Trabajador</button>
        </form>
    </div>
@endsection
