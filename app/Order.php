<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'orderID';
    protected $fillable = ['userID', 'status'];

    public function products(){
        return $this->belongsToMany('App\Product', 'orderdetails', 'orderID', 'productID');
    }
}
