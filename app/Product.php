<?php

namespace App;

class Product extends Model
{
    public function service()
    {
    	return $this->belongsTo(Service::class);
    }
}
