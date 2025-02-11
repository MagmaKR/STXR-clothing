<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    /** @use HasFactory<\Database\Factories\SizesFactory> */
    use HasFactory;

    public static array $Sizes = ['XS','S', 'M ' , 'L' , 'XL' , 'XXL'];

    public function StockManagement() {

        return $this->belongsTo(StockManagement::class);
    }

}
