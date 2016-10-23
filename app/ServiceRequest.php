<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $dates = ['request_date'];

    public function getTimeFormatAttribute()
    {
        $time_parts = explode(':', $this->request_time);
        return $time_parts[0] . ':' . $time_parts[1];
    }

    public function getDateFormatAttribute()
    {
        return $this->request_date->format('m/d/Y');
    }
}
