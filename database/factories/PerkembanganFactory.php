<?php

namespace Database\Factories;

use App\Models\Pakan;
use App\Models\Populasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perkembangan>
 */
class PerkembanganFactory extends Factory
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
            'umur' => $this->faker->randomNumber(),
            'kematian_atas' => $this->faker->randomNumber(),
            'kematian_bawah' => $this->faker->randomNumber(),
            'id_tipe_pakan_atas' => Pakan::factory(),
            'pakan_atas' => $this->faker->randomNumber(),
            'id_tipe_pakan_bawah' => Pakan::factory(),
            'pakan_bawah' => $this->faker->randomNumber(),
            'abw_normal_atas' => $this->faker->randomFloat(2, 0, 999),
            'abw_normal_bawah' => $this->faker->randomFloat(2, 0, 999)
        ];
    }
}
