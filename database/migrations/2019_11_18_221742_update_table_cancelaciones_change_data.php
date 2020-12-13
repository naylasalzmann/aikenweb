<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableCancelacionesChangeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cancelaciones', function (Blueprint $table) {
            /*$table->dropColumn([
                    'codigo', 
                    'identificacion', 
                    'nombre', 
                    'apellido', 
                    'telefono', 
                    'email', 
                    'monto_total'
                ]);*/

            $table->unsignedInteger('reserva_id')->after('id');

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
            
            $table->dropColumn('reserva_id');

            /*$table->string('codigo');
            $table->string('identificacion');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('email');
            $table->decimal('monto_total', 8, 2);*/
        });
    }
}
