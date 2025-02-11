<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $quantity = fake()->numberBetween(1, 10);
        
        return [
            'order_id' => Orders::inRandomOrder()->first()->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'priceAtPurchase' => $product->price,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
