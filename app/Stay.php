<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Stay extends Model
{
    public $guarded = [];
    
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

    public function services()
    {
    	return $this->belongsToMany(Service::class)->withPivot('date', 'quantity');
    }

    public function addServices($services)
    {
        // ovo ne valja, treba da se proslede i podaci iz pivota
        foreach($services as $service)
        {
            $this->services()->attach($service, ['date' => $date, 'quantity' => $quantity]);
        }
    }
}
