<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $guarded = [];

    public function guias() 
    {

    	return $this->hasMany(Guia::class);

    }
}
