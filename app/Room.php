<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function reservations()
    {
    	return $this->hasMany(Reservation::class);
    }

    public function addReservation($reservation)
    {
    	$this->reservations()->create($reservation);
    }

    public function stays()
    {
    	return $this->hasMany(Stay::class);
    }
}
