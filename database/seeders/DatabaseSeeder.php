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
         Product::factory(100)->create();
        \App\Models\OrderItems::factory(100)->create();
        \App\Models\ProductImages::factory(100)->create();

        // Create some products with various stock levels
        Product::factory(10)->create()->each(function ($product) {

            
            // For each product, create stock entries for different color and size combinations
            Colors::all()->each(function ($color) use ($product) {
                Sizes::all()->each(function ($size) use ($product, $color) {
                    StockManagement::factory()->create([
                        'product_id' => $product->id,
                        'color_id' => $color->id,
                        'size_id' => $size->id,
                    ]);
                });
            });
        });

        // Create some products with low stock
        StockManagement::factory(5)->lowStock()->create();

        // Create some out-of-stock products
        StockManagement::factory(3)->outOfStock()->create();
    }
}
