<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            MasterProjectSeeder::class,
            MasterDepartmentSeeder::class,
            MasterLocationSeeder::class,
            MasterDeviceSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Administrator SYMITRA',
            'email' => 'admin@symitra.com',
            'password' => bcrypt('password123'), // Set password default
        ]);
    }
}