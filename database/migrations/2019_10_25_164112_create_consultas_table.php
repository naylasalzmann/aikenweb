<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('salida_id')->nullable();
            $table->unsignedInteger('pais_id')->nullable();
            $table->unsignedInteger('provincia_id')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('email');
            $table->text('descripcion');
            $table->boolean('vista')->default(false);
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
        Schema::dropIfExists('consultas');
    }
}
