<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Colors;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colors>
 */
class ColorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'colours' =>fake()->randomElement(Colors::$Colours)
        ];
    }
}
