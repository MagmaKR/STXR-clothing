<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockManagement extends Model
{
    /** @use HasFactory<\Database\Factories\StockManagementFactory> */
    use HasFactory;

    public function Products() {

        return $this->hasMany(Product::class);
    }

    public function Sizes() {

        return $this->hasMany(Sizes::class);
    }
    
    public function Colours() {

        return $this->hasMany(Colors::class);
    }
}
