<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    /** @use HasFactory<\Database\Factories\ColorsFactory> */
    use HasFactory;

    public static array $Colours = ['Red','blue', 'Black ' , 'White'];

    public function StockManagement() {

        return $this->belongsTo(StockManagement::class);
    }


}
