<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFechasTableAddCupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fechas', function (Blueprint $table) {
            $table->smallInteger('cupo')->default('0')->after('concretada');

            $table->foreign('salida_id')->references('id')->on('salidas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fechas', function (Blueprint $table) {
            
            $table->dropForeign(['salida_id']);

            $table->dropColumn('cupo');
            
        });
    }
}
