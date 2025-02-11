<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public static array $ClothesTypes = ['Hoodie','Shirt', 'Pants' , 'Socks' , 'Headwear'];
    public function OrderItems() {

        return $this->belongsTo(OrderItems::class);
    }

    public function StockManagement() {

        return $this->belongsTo(StockManagement::class);
    }

    public function Review() {

        return $this->hasMany(related: Reviews::class);
    }


}
