<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableCancelacionesAddFkReservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cancelaciones', function (Blueprint $table) {
            
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
        Schema::table('cancelaciones', function (Blueprint $table) {
            
            $table->dropForeign(['reserva_id']);

        });
    }
}
