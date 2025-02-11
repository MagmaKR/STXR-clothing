<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(Product::$ClothesTypes),
            'price' => fake()->randomFloat(2,0,1000),
            'delivery_fee' =>fake()->randomFloat(2,0,100),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            
        ];
    }
}
