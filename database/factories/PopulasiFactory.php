<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Populasi>
 */
class PopulasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jumlah' => $this->faker->randomNumber(),
            'berat' => $this->faker->randomNumber(),
            'umur_akhir' => $this->faker->randomFloat(1, 0, 99.9),
            'grade_doc' => $this->faker->randomElement(['Silver', 'Gold', 'Platinum']),
            'bw_doc' => $this->faker->randomNumber(),
            'asal_doc' => $this->faker->text(75),
            'check_in' => $this->faker->date(),
            'check_out' => $this->faker->date(),
        ];
    }
}
