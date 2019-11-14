<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //Table name
    protected $table = 'addresses';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
