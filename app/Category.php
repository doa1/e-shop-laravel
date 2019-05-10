<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    //get the products relations
    public function products()
    {
        # a category can have many products:: show this via hasmany()
        return $this->hasMany('App\Product');
    }
}
