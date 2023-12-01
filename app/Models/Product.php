<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getPriceAttribute($value)
    {
        $discount = $value * ($this->discount / 100); //discount in euro's
        $final_price = $value - $discount; //retract discount from price        
        return number_format($final_price, 2); //return price with 2 decimals
        
    }

    public function getOriginalPriceAttribute()
    {
        $originalPrice = $this->attributes['price'];

        return $originalPrice;
    }
}


