<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'role_name' => 'admin',
                'created_at' => now(),
            ],
            [
                'role_name' => 'doktor',
                'created_at' => now(),
            ],
            [
                'role_name' => 'pasien',
                'created_at' => now(),
            ],
            [
                'role_name' => 'midwife',
                'created_at' => now(),
            ],
        ]);
    }
}
