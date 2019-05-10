<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class Product extends Model
{
    // a product might have many orders and vice verse bytha
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function discount_amount(){
        //get the discount amount per product
        return $this->original_price - $this->discount_price;
    }
}
