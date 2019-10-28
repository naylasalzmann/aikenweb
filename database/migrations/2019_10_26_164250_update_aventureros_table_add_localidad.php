<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAventurerosTableAddLocalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aventureros', function (Blueprint $table) {
            
            $table->unsignedInteger('localidad_id')->nullable()->after('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aventureros', function (Blueprint $table) {
            
            $table->dropColumn('localidad_id');

        });
    }
}
