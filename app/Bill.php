<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function stay()
    {
    	return $this->belongsTo(Stay::class);
    }
}