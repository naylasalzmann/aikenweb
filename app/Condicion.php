<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    protected $table = 'condiciones';

    protected $guarded = [];

    public function salidas()
    {

    	return $this->hasMany(Salida::class);	

    }
}
