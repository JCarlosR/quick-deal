<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function requirements()
    {
        return $this->hasMany('App\ServiceRequest');
    }

    public function getIsAdminAttribute()
    {
        return $this->id == 1;
    }

    public function service_type()
    {
        return $this->belongsTo('App\ServiceType');
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getMainRouteAttribute()
    {
        if ($this->provider)
            return '/apply';

        return '/request'; // user non-provider
    }
}
