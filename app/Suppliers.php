<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    //Table name
    protected $table = 'suppliers';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function Suppliers()
    {
        return $this->hasMany('App\Products');
    }
}
