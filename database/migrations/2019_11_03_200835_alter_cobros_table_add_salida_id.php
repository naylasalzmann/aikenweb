<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCobrosTableAddSalidaId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobros', function (Blueprint $table) {

            $table->unsignedInteger('salida_id')->nullable()->after('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobros', function (Blueprint $table) {
            
            $table->dropColumn('salida_id');
            
        });
    }
}
