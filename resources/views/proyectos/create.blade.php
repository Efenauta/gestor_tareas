@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Crear Proyecto</h1>
        <form action="{{ route('proyectos.store') }}" method="POST">
            @csrf
            <div>
                <label for="nombre">Nombre del Proyecto</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear Proyecto</button>
        </form>
    </div>
@endsection