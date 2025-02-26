<?php

namespace Database\Seeders;

use App\Models\Pakan;
use App\Models\Performa_actual;
use App\Models\Perkembangan;
use App\Models\Populasi;
use App\Models\Standar_peforma;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Pakan::factory()->create();
        Perkembangan::factory()->create();
        Populasi::factory()->create();
        Standar_peforma::factory()->create();
        Performa_actual::factory()->create();
    }
}
