<?php

namespace Database\Factories;

use App\Models\Sizes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sizes>
 */
class SizesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'SizeOfClothing' => fake()->randomElement(Sizes::$Sizes),
        ];
    }
}
