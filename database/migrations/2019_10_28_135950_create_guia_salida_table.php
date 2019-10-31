<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_salida', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('guia_id');
            $table->unsignedInteger('salida_id');
            $table->timestamps();

            $table->unique(['guia_id', 'salida_id']);

            $table->foreign('guia_id')->references('id')->on('guias')->onDelete('cascade');
            $table->foreign('salida_id')->references('id')->on('salidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guia_salida', function (Blueprint $table) {

            $table->dropUnique(['guia_id', 'salida_id']);    

            $table->dropForeign(['guia_id']);
            $table->dropForeign(['salida_id']);
        });

        Schema::dropIfExists('guia_salida');
    }
}
