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
    //Mass Assignments
    protected $fillable = ['user_id', 'cart_id', 'status', 'Total_Amount'];

    public function cart()
    {
        return $this->belongsTo('App\cart');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function order_details()
    {
        return $this->hasMany('App\order_details');
    }
    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}
