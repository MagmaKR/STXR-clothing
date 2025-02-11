<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;

    public static array $DeliveryStatus = ['Received','Dispatched', 'Pending ' , 'Delivered'];

    public function User() {

        return $this->belongsTo(User::class);
    }

    public function OrderItems() {

        return $this->hasMany(OrderItems::class);
    }

    
}
