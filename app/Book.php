<?php

namespace App;

class Book extends Model
{
    public function rentals()
    {
        return $this->hasMany('App\Rental');
    }
}
