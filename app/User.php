<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'password','verifyToken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
    public function cart()
    {
        return $this->hasOne('App\cart');
    }
    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
    public function orders()
    {
        return $this->hasMany('App\orders');
    }
}
