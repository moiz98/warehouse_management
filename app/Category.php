<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Table name
    protected $table = 'categories';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    
}
