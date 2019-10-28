<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('estado_id')->default('1');
            $table->unsignedInteger('metodo_pago_id');
            $table->unsignedInteger('fecha_id');
            $table->string('codigo')->unique();
            $table->string('identificacion');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->smallInteger('cant_aventureros')->default('1');
            $table->decimal('monto_total', 8, 2);
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos');
            $table->foreign('fecha_id')->references('id')->on('fechas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            
            $table->dropForeign(['estado_id']);
            $table->dropForeign(['metodo_pago_id']);
            $table->dropForeign(['fecha_id']);

        });

        Schema::dropIfExists('reservas');
    }
}