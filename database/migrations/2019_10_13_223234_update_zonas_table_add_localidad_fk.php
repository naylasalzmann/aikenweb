<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateZonasTableAddLocalidadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zonas', function (Blueprint $table) {
            
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
        Schema::table('zonas', function (Blueprint $table) {
            
            $table->dropForeign(['localidad_id']);

        });
    }
}
