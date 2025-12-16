<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            // Datos Alumno
            $table->string('nombre');
            $table->string('dni')->unique();
            $table->date('fecha_ingreso');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('localidad');
            $table->string('matricula')->unique();
            $table->string('seccion');
            $table->decimal('valor_cuota', 10, 2);
            $table->decimal('bonificacion', 5, 2)->default(0);

            // Datos Familia
            $table->string('padre')->nullable();
            $table->string('madre')->nullable();
            $table->string('telefono_padre')->nullable();
            $table->string('telefono_madre')->nullable();
            $table->string('dni_padre')->nullable();
            $table->string('dni_madre')->nullable();
            $table->text('hermanos')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
