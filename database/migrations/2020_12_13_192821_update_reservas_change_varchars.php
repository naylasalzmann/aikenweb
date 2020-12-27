<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReservasChangeVarchars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->string('codigo', 50)->change();
            $table->string('identificacion', 50)->change();
            $table->string('nombre', 20)->change();
            $table->string('apellido', 20)->change();
            $table->string('direccion', 50)->change();
            $table->string('telefono', 50)->change();
            $table->string('email', 50)->change();
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
            $table->string('codigo', 255)->change();
            $table->string('identificacion', 255)->change();
            $table->string('nombre', 255)->change();
            $table->string('apellido', 255)->change();
            $table->string('direccion', 255)->change();
            $table->string('telefono', 255)->change();
            $table->string('email', 255)->change();
        });
    }
}
