<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	public $guarded = [];

    public function stays()
    {
    	return $this->hasMany(Stay::class);
    }
}
