<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class ServiceRequest extends Model
{
    protected $dates = ['request_date'];

    public static function boot() {
        parent::boot();

        static::created(function($service_request) {
            Event::fire('service_request.created', $service_request);
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTimeFormatAttribute()
    {
        $time_parts = explode(':', $this->request_time);
        return $time_parts[0] . ':' . $time_parts[1];
    }

    public function getDateFormatAttribute()
    {
        return $this->request_date->format('m/d/Y');
    }

    public function service_type()
    {
        return $this->belongsTo('App\ServiceType');
    }
}
