<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    //Table name
    protected $table = 'reports';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
