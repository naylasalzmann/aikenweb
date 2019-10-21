<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTiposSalidaTableChangeIdInteger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipos_salida', function (Blueprint $table) {
            
            $table->increments('id')->change();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipos_salida', function (Blueprint $table) {
                
            $table->bigIncrements('id')->change();     

        });
    }
}
