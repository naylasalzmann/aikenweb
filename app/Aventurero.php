<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aventurero extends Model
{
    protected $guarded = [];
    

    public function getAge() {

    	$years = Carbon::parse($this->fecha_nacimiento)->age;


    	return $years ? $years : '';
    }
}
