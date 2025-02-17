<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\StockManagement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory(100)->create();
        
       
        \App\Models\Orders::factory(100)->create();
       Sizes::factory(10)->create();
        Colors::factory(10)->create();
       
       
        \App\Models\OrderItems::factory(100)->create();
       
        $this->call(class: ProductSeeder::class);
        // Create some products with various stock levels
        
    }
}
