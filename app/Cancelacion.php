<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancelacion extends Model
{
    protected $table = 'cancelaciones';

    protected $guarded = [];

    public function updateCupoFecha($cant_aventureros, $fecha)
    {
    	$fecha->decrement('cupo', $cant_aventureros);
    }
}
