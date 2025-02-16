<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTrabajadorTable extends Migration
{
    public function up()
    {
        Schema::create('tareas_trabajador', function (Blueprint $table) {
            $table->foreignId('id_tarea')->constrained('tareas')->onDelete('cascade');
            $table->foreignId('id_trabajador')->constrained('trabajadores')->onDelete('cascade');
            $table->primary(['id_tarea', 'id_trabajador']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareas_trabajador');
    }
}
