<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaExamenUniversidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_universidades', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('universidad_id');
          $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('examen_universidades');
    }
}
