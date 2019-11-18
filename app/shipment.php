<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    //Table name
    protected $table = 'shipments';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function orders()
    {
        return $this->hasOne('App\orders');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
