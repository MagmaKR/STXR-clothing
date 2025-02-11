<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemsFactory> */
    use HasFactory;

    public function Order() {

        return $this->belongsTo(Orders::class);
    }

    public function Products() {

        return $this->hasMany(Product::class);
    }
}
