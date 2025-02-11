<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Orders;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total_amount = fake()->randomFloat(2, 0, 1000);
        $delivery_amount = fake()->randomFloat(2, 0, 100);
        
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'order_date' => fake()->dateTimeBetween('-1 year', '+2 years'),
            'total_amount' => $total_amount,
            'delivery_amount' => $delivery_amount,
            'Net_cost' => $total_amount + $delivery_amount,
            'DeliveryStatus' => fake()->randomElement(Orders::$DeliveryStatus),
            'order_items' => fake()->sentence(5),
        ];
    }
}
