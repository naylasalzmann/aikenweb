<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $guarded = [];

    public function reservas()
    {

    	return $this->hasMany(Reserva::class);	

    }
}
