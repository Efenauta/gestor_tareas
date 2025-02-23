<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $fillable = ['nombre', 'rol'];

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class, 'tareas_trabajador', 'id_trabajador', 'id_tarea');
    }
}


