<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGuiasTableAddLocalidadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function (Blueprint $table) {

            $table->unsignedInteger('localidad_id')->change();
            
            $table->foreign('localidad_id')->references('id')->on('localidades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guias', function (Blueprint $table) {

            $table->unsignedBigInteger('localidad_id')->change();
            
            $table->dropForeign(['localidad_id']);

        });
    }
}
