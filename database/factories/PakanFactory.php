<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pakan>
 */
class PakanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis' => $this->faker->text(75),
            'jumlah' => $this->faker->randomNumber(),
            'tgl_beli' => $this->faker->date(),
            'keterangan' => $this->faker->text(255),
        ];
    }
}
