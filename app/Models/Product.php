<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        #One to many inverse relationship
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function shopcart(){
        return $this->hasMany(ShopCart::class);
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class);
    }
}
