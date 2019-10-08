<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenpreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_pregunta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('examen_id');
            $table->unsignedInteger('pregunta_id');
            $table->string('respuesta_seleccionada');
            $table->boolean('correcta');

            $table->foreign('examen_id')
              ->references('id')
              ->on('examenes')
              ->onDelete('cascade');
            $table->foreign('pregunta_id')
              ->references('id')
              ->on('preguntas')
              ->onDelete('cascade');
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
        Schema::dropIfExists('examen_pregunta');
    }
}
