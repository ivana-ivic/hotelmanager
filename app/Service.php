<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public $guarded = [];
	
    public function stay()
    {
    	return $this->belongsTo(Stay::class);
    }
}
