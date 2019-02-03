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
    	return $this->belongsToMany(Service::class)->withPivot('id', 'date', 'quantity');
    }

    public function addServices($services)
    {
        foreach ($services as $servicedata)
        {
            $id = $servicedata['id'];
            $service = Service::where('id', $id)->get();
            $this->services()->attach($service, ['date' => $this->check_in_time, 'quantity' => $servicedata['quantity']]);
        }
    }

    public function updateServices($services)
    {
        $services_to_add = array();
        $pivot_ids = array();
        foreach ($services as $service)
        {
            if(!isset($service["pivot_id"]))
            {
                // ubaci u listu nove servise
                array_push($services_to_add, $service);
            }
            else
            {
                // zapisi koje treba da proveri
                $pivot_id = $service["pivot_id"];
                array_push($pivot_ids, $pivot_id);
                //i apdejtuj ih
                $this->services()->updateExistingPivot($service['id'], ['quantity' => $service['quantity']]);
            }
        }
        // otkaci servise koji su obrisani tj koji nisu u requestu
        $result = $this->services()->wherePivotIn('id', $pivot_ids, 'and', True)->get();
        if(!$result->isEmpty())
        {
            foreach($result as $service)
            {
                $this->removeService($service);
            }
        }
        //dodaj nove servise
        $this->addServices($services_to_add);
    }

    public function removeService($service)
    {
        $this->services()->detach($service);
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
