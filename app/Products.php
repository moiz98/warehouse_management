<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //Table name
    protected $table = 'products';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
