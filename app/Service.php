<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public $guarded = [];
	
    public function stays()
    {
    	return $this->belongsToMany(Stay::class)->withPivot('id', 'date', 'quantity');
    }
}
