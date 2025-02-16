<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'finalizada', 'id_proyecto'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function trabajadores()
    {
        return $this->belongsToMany(Trabajador::class, 'tareas_trabajador', 'id_tarea', 'id_trabajador');
    }
}
