<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaTutoriales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoriales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('texto');
            $table->unsignedInteger('subcategoria_id');
            $table->unsignedInteger('universidad_id');

            $table->timestamps();
            $table->foreign('subcategoria_id')
              ->references('id')
              ->on('subCategorias')
              ->onDelete('cascade');
            $table->foreign('universidad_id')
                ->references('id')
                ->on('universidades')
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
        Schema::dropIfExists('tutoriales');
    }
}
