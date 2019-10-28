<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmacion extends Model
{
    protected $table = 'confirmaciones';

    protected $guarded = [];
    

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function fecha()
    {
        return $this->hasOneThrough(Fecha::class, Reserva::class);
    }

    public function updateCupoFecha($cant_aventureros, $fecha)
    {
    	$fecha->increment('cupo', $cant_aventureros);
    }

    public function updateReservaConfirmada($reserva)
    {

        $reserva->update([

            'confirmada' => true
        ]);
    }
}
