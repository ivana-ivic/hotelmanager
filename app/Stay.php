<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stay extends Model
{
    public function reservation()
    {
    	return $this->belongsTo(Reservation::class);
    }

    public function guest()
    {
    	return $this->belongsTo(Guest::class);
    }

    public function bill()
    {
    	return $this->hasOne(Bill::class);
    }

    public function stays()
    {
    	return $this->hasMany(Service::class);
    }
}
