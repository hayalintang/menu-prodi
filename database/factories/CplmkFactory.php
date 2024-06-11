<?php

namespace Database\Factories;

use App\Models\Cpl;
use App\Models\Matkul;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cplmk>
 */
class CplmkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpl_id' => Cpl::inRandomOrder()->first()->id,
            'matkul_id' => Matkul::inRandomOrder()->first()->id,
            'bobot' => fake()->numberBetween(1, 100)
        ];
    }
}
