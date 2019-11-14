<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //Table name
    protected $table = 'orders';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
