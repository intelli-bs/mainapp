<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function employees()
    {
        return $this->belongsToMany('App\User', 'tracker_vehicles', 'vehicle_id', 'user_id')
            ->withPivot('start','end')
            ->withTimestamps();
    }
}
