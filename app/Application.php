<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function service_request()
    {
        return $this->belongsTo('App\ServiceRequest');
    }
}
