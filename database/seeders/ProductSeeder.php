<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * un the database seeds.
     */
    public function run(): void
    {
        
        Product::insert([
            [
                'name' => 'For the DXWGS STXR  TEE',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => null 
            ],
            [
                'name' => 'STX  GRILLZ',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => null 
            ],
            [
                'name' => 'Faith over fear ',
                'price' => '400.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Christian'
            ],[
                'name' => '[Angel wings] Stxr hoodie',
                'price' => '400.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'STXR Angles'
            ],
            [
                'name' => 'God is Good [ hoodie ]',
                'price' => '400.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Christian'
            ],
            [
                'name' => 'The Table (hoodie)',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Christian'
            ],
            [
                'name' => 'Stxr minimalistic tee ',
                'price' => '220.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => null 
            ],
            [
                'name' => 'STXR Angles',
                'price' => '500.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'STXR Angles ' 
            ],
            [
                'name' => 'Jesus Hoodie',
                'price' => '400.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Christian ' 
            ],
            [
                'name' => 'God is always with me hoodie',
                'price' => '400.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Christian ' 
            ],
            [
                'name' => 'Savior ',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Christian ' 
            ],
            [
                'name' => 'Triple',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => null 
            ],
            
            [
                'name' => 'Summer drop (orange)',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Summer collection' 
            ],
            [
                'name' => 'Summer drop (green)',
                'price' => '200.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => 'Summer collection' 
            ],
            [
                'name' => 'Man of faith lion hoodie',
                'price' => '400.00', 
                'delivery_fee' => '80.00', 
                'times' => now(), 
                'collection' => null 
            ],

        ]);
    }


   
}
