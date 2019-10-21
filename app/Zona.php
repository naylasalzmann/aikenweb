<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $guarded = [];
    
    public function localidad()
    {

        return $this->belongsTo('App\Localidad');

    }
}
