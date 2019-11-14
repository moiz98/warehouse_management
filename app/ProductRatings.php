<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRatings extends Model
{
    //Table name
    protected $table = 'product_ratings';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
