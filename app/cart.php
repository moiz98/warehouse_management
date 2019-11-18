<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //Table name
    protected $table = 'carts';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function orders()
    {
        return $this->hasMany('App\orders');
    }
}
