<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstudianteAcuentesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_acuentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiantes_id')->unsigned();
            $table->integer('acudientes_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes');
            $table->foreign('acudientes_id')->references('id')->on('acudientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estudiante_acuentes');
    }
}
