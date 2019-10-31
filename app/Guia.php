<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    protected $guarded = [];

    public function salidas()
    {
        return $this->belongsToMany('App\Salida');
    }

    /**
     * Trae el titulo a quien le pertenece el guia.
     */
    public function titulo()
    {
        return $this->belongsTo('App\Titulo');
    }

    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }

}
