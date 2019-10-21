<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSalida extends Model
{
    protected $table = 'tipos_salida';

    protected $guarded = [];

    public function salidas()
    {

    	return $this->hasMany(Salida::class);	

    }
    
}
