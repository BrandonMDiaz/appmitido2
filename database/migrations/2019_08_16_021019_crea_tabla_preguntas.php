<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('universidad_id');
            $table->unsignedInteger('subcategoria_id');
            $table->text('pregunta');
            $table->string('imagen')->nullable();
            $table->string('opcion1');
            $table->string('opcion2');
            $table->string('opcion3');
            $table->string('respuesta');

            $table->timestamps();
            $table->foreign('universidad_id')
              ->references('id')
              ->on('universidades')
              ->onDelete('cascade');
            $table->foreign('subcategoria_id')
              ->references('id')
              ->on('subcategorias')
              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
