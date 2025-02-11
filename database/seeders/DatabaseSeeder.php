<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users first
        User::factory(100)->create();
        
        // Then create orders that will be associated with the users
        \App\Models\Orders::factory(100)->create();
        \App\Models\Sizes::factory(10)->create();
        \App\Models\Colors::factory(10)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\OrderItems::factory(100)->create();

    }
}
