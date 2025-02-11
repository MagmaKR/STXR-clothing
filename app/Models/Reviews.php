<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewsFactory> */
    use HasFactory;

    public function Product() {

        return $this->belongsTo(Product::class);
    }

    public function Users() {

        return $this->belongsTo(Orders::class);
    }

}
