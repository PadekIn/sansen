<?php

namespace Database\Factories;

use App\Models\Populasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performa_actual>
 */
class PerformaActualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'populasi_id' => Populasi::factory(),
            'fcr' => $this->faker->randomFloat(3, 0, 999),
            'fi' => $this->faker->randomFloat(3, 0, 999),
            'fe' => $this->faker->randomFloat(2, 0, 999),
            'dep' => $this->faker->randomFloat(2, 0, 999),
            'abw' => $this->faker->randomFloat(2, 0, 999),
            'adg' => $this->faker->randomNumber(),
            'ip' => $this->faker->randomNumber()
        ];
    }
}
