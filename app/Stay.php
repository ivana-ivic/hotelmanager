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
        $services = request('services');
        foreach ($services as $service)
        {
            $parts = explode(' ', $service);
            $id = (int)$parts[0];
            $service = Service::where('id', $id)->get();
            $this->services()->attach($service, ['date' => $this->check_in_time, 'quantity' => $parts[1]]);
        }
    }

    public function addBill($bill)
    {
        $this->bill()->create($bill);
    }

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }
}
