<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateConfirmacionesTableAddCascade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confirmaciones', function (Blueprint $table) {
            
            $table->dropForeign(['reserva_id']);

            $table->foreign('reserva_id')
            ->references('id')
            ->on('reservas')
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
        Schema::table('confirmaciones', function (Blueprint $table) {
            
            $table->dropForeign(['reserva_id']);

            $table->foreign('reserva_id')->references('id')->on('reservas');
        });
    }
}
