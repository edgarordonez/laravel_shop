<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'last_name', 'type', 'active', 'address'];
    protected $hidden = ['password', 'remember_token'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
