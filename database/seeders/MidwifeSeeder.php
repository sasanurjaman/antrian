<?php

namespace Database\Seeders;

use App\Models\Midwife;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MidwifeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Midwife::factory()
            ->count(4)
            ->create();
    }
}
