<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula');
            $table->string('nombre');
            $table->string('cargo');
            $table->string('tipo_personal');
            $table->string('adscrito');
            $table->string('tipo_permiso');
            $table->string('duracion');
            $table->date('fecha_requerida');
            $table->string('suplente');
            $table->string('aprobacion');
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
        Schema::drop('permisos');
    }
}
