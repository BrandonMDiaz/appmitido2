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
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('categoria_id');
            $table->string('nombre');
            $table->timestamps();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            $table->foreign('categoria_id')
              ->references('id')
              ->on('users')
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
