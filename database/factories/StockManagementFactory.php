<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Colors;
use App\Models\Sizes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockManagement>
 */
class StockManagementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'color_id' => Colors::inRandomOrder()->first()->id,
            'size_id' => Sizes::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(0, 100),
            'low_stock_threshold' => 10, // Alert when stock goes below this number
            'status' => $this->faker->randomElement(['in_stock', 'low_stock', 'out_of_stock']),
            'last_restock_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the product is low on stock
     */
    public function lowStock()
    {
        return $this->state(function (array $attributes) {
            return [
                'quantity' => $this->faker->numberBetween(1, 9),
                'status' => 'low_stock',
            ];
        });
    }

    /**
     * Indicate that the product is out of stock
     */
    public function outOfStock()
    {
        return $this->state(function (array $attributes) {
            return [
                'quantity' => 0,
                'status' => 'out_of_stock',
            ];
        });
    }

    /**
     * Indicate that the product is well stocked
     */
    public function wellStocked()
    {
        return $this->state(function (array $attributes) {
            return [
                'quantity' => $this->faker->numberBetween(50, 100),
                'status' => 'in_stock',
            ];
        });
    }
}
