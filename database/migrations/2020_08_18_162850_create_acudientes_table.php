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
            $table->interger('persona_id')->unsigned();
            $table->string('direccion');
            $table->string('barrio');
            $table->string('profesion');
            $table->string('correo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('persona_id')->references('id')->on('persona');
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
