@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modificar Tarea</h1>
    <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre de la Tarea</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $tarea->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $tarea->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="finalizada">Finalizada</label>
            <select name="finalizada" id="finalizada" class="form-control" required>
                <option value="1" {{ old('finalizada', $tarea->finalizada) == 1 ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('finalizada', $tarea->finalizada) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_proyecto">Proyecto Asociado</label>
            <select name="id_proyecto" id="id_proyecto" class="form-control" required>
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}" {{ old('id_proyecto', $tarea->id_proyecto) == $proyecto->id ? 'selected' : '' }}>
                        {{ $proyecto->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
