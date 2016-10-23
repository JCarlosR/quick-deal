<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    public function requests()
    {
        return $this->hasMany('App\ServiceRequest');
    }
}
