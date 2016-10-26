<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    public function requests()
    {
        return $this->hasMany('App\ServiceRequest');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
