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

    public function Products()
    {
        return $this->hasMany('App\Products');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
