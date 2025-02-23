@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modificar Proyecto</h1>
    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $proyecto->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $proyecto->descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection