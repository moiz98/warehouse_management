<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    //Table name
    protected $table = 'order_details';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
