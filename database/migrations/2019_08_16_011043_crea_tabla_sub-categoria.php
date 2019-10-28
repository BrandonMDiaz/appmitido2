<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaSubCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subCategorias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('universidad_id');
            $table->unsignedInteger('categoria_id');
            $table->string('nombre');
            $table->timestamps();
            $table->foreign('universidad_id')
              ->references('id')
              ->on('universidades')
              ->onDelete('cascade');
            $table->foreign('categoria_id')
              ->references('id')
              ->on('categorias')
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
        Schema::dropIfExists('subCategorias');
    }
}
