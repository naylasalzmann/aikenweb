<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    protected $guarded = [];

    public function reservas()
    {

    	return $this->hasMany(Reserva::class, 'metodo_pago_id');	

    }
}
