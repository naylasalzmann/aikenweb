<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\Factory;

class Fecha extends Model
{
	protected $guarded = [];

    public function salida()

    {

    	return $this->belongsTo(Salida::class);

    }

    public function reservas()
    {

    	return $this->hasMany(Reserva::class);	

    }

    public function confirmaciones()
    {

        return $this->hasManyThrough(Confirmacion::class, Reserva::class);

    }

    public function getFormattedInicio() {

    	$martinDateFactory = new Factory([
    		'locale' => 'es_ES',
    		'timezone' => 'America/Cordoba',
		]);

		//$dt = $this->inicio->toDayDateTimeString(); 
		$dt = Carbon::parse($this->inicio);

		$toDisplay = $martinDateFactory->make($dt)->isoFormat('lll');
    	
		return $toDisplay;
    	//return Carbon::parse($this->inicio)->format('d-m-Y');
	}

	public function getDaysDuration() {
		$inicio = Carbon::parse($this->inicio);
		$fin = Carbon::parse($this->fin);
		
		return $inicio->diffInDays($fin);	
	}

	public function getHoursDuration() {
		$inicio = Carbon::parse($this->inicio);
		$fin = Carbon::parse($this->fin);
		
		return $inicio->diffInHours($fin);
	}

	public function getSmartDuration() {
		switch ($this) {
			case $this->getDaysDuration() == 1:
				return $this->getDaysDuration().' día';
				break;
				case $this->getDaysDuration() > 1:
				return $this->getDaysDuration().' días';
				break;
			
			default:
				return $this->getHoursDuration().' horas';
				break;
		}
	}
}
