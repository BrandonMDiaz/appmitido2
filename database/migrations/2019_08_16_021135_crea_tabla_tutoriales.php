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
            $table->bigIncrements('id');
            $table->unsignedInteger('subcategoria_id');
            $table->timestamps();
            $table->foreign('subcategorias_id')
              ->references('id')
              ->on('subCategorias')
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
