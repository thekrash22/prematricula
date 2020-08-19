<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcudientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acudientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personas_id')->unsigned();
            $table->string('direccion');
            $table->string('barrio');
            $table->string('profesion');
            $table->string('correo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personas_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acudientes');
    }
}
