<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //Table name
    protected $table = 'inventories';
    //primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function Products()
    {
        return $this->hasMany('App\Products');
    }
}
