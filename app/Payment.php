<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //Table name
    protected $table = 'payments';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
