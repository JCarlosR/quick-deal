<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class Application extends Model
{
    public static function boot()
    {
        parent::boot();

        static::created(function ($application) {
            Event::fire('application.created', $application);
        });

    }

    public function service_request()
    {
        return $this->belongsTo('App\ServiceRequest');
    }

    public function provider()
    {
        return $this->belongsTo('App\User');
    }
}
