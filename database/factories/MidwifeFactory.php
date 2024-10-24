<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Midwife>
 */
class MidwifeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()
                ->unique()
                ->numberBetween(11, 15),
            'midwife_name' => fake()->name(),
            'midwife_gender' => fake()->randomElement([
                'Laki-laki',
                'Perempuan',
            ]),
            'midwife_brithday' => fake()
                ->dateTimeBetween('1990-01-01', '2012-01-01')
                ->format('Y-m-d'),
            'midwife_address' => fake()->address(),
            'midwife_specialization' => fake()->word(),
        ];
    }
}
