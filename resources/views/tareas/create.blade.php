<!-- resources/views/tareas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold">Crear Tarea</h1>
        <form action="{{ route('tareas.store') }}" method="POST" style="display:grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            @csrf
            <div>
                <label for="nombre">Nombre de la Tarea</label>
                <br>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <br>
                <textarea name="descripcion" id="descripcion" required></textarea>
            </div>
            <div>   
                <?php
                    if(isset($proyecto)){
                        echo '<p>Proyecto: ' . $proyecto->nombre . '</p>';
                        echo '<input hidden name="id_proyecto" value="' . $proyecto->id . '">';
                    } else if(isset($proyectos)) {
                        echo '<label for="id_proyecto">Proyecto </label><select name="id_proyecto" required>';
                        foreach ($proyectos as $proyecto){
                            echo '<option value="' . $proyecto->id . '">' . $proyecto->nombre . '</option>';
                        }
                        $proyecto = null;
                        echo '</select>';
                    } else {
                        echo 'ERROR!<br>';
                    }
                ?>
            </div>
            <div>
                <label for="finalizada">Finalizada: </label>
                <input type="hidden" name="finalizada" value="0">
                <input type="checkbox" name="finalizada" id="finalizada" value="1">
            </div>
            <button type="submit" class="btn btn-primary">Crear
            <?php
                if(isset($proyecto)){
                    echo ' y añadir a ' . $proyecto->nombre;
                }
            ?>
            </button>
            <?php
                if(isset($proyecto)){
                    echo "<a class='btn btn-primary' href='/proyectos/" . $proyecto->id . "'>Volver a " .  $proyecto->nombre . "</a>";
                }
            ?>
        </form>
    </div>
@endsection

