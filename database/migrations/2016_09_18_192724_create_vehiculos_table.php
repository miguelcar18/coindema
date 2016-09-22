<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unidad');
            $table->string('marca');
            $table->string('modelo');
            $table->string('placa');
            $table->string('serial');
            $table->string('carroceria');
            $table->string('serial_motor');
            $table->string('color');
            $table->text('estado');
            $table->integer('departamento')->unsigned();
            $table->foreign('departamento')->references('id')->on('departamentos')->onDelete('cascade');
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
        Schema::drop('vehiculos');
    }
}
