<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Standar_peforma>
 */
class StandarPeformaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fcr' => $this->faker->randomFloat(3, 0, 999),
            'fi' => $this->faker->randomFloat(3, 0, 999),
            'fe' => $this->faker->randomFloat(2, 0, 999),
            'dep' => $this->faker->randomFloat(2, 0, 999),
            'abw' => $this->faker->randomFloat(2, 0, 999),
            'adg' => $this->faker->randomNumber(),
            'ip' => $this->faker->randomNumber(),
        ];
    }
}
