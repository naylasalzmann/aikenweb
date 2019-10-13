<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLocalidadesTableAddProvinciasFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('localidades', function (Blueprint $table) 
        {

            $table->renameColumn('id_provincia', 'provincia_id');

            $table->foreign('provincia_id')->references('id')->on('provincias');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('localidades', function (Blueprint $table) 
        {

            $table->dropForeign(['provincia_id']);

            $table->renameColumn('provincia_id', 'id_provincia');

        });    

    }
}
