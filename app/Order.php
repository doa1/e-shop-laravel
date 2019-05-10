<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Order extends Model
{
    //one order can have one or more products and one product can have one or more orders::Many-to-Many-Rel
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    //suppose we have a customer table,there can be one-to-many rel as show
    public function customer()
    {
        return $this->belongsTo('App\User');
    }

}
