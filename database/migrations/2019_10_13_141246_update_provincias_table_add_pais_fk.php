<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProvinciasTableAddPaisFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provincias', function (Blueprint $table) {
            
            $table->renameColumn('id_pais', 'pais_id');

            $table->foreign('pais_id')->references('id')->on('paises');        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provincias', function (Blueprint $table) {
            
            $table->dropForeign(['pais_id']);

            $table->renameColumn('pais_id', 'id_pais');

        });
    }
}
