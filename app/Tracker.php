<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    public function trackerLogs()
    {
        return $this->hasMany('App\TrackerLog');
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle', 'tracker_vehicles', 'tracker_id', 'vehicle_id')
            ->withPivot('install','uninstall')
            ->withTimestamps();
    }
}
