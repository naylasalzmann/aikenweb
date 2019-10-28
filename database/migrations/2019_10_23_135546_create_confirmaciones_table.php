<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reserva_id');
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('reservas');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confirmaciones', function (Blueprint $table) {
            
            $table->dropForeign(['reserva_id']);

        });

        Schema::dropIfExists('confirmaciones');
    }
}