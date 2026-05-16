<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\MasterLocation::insert([
            ['location_name' => 'Head Office – Balikpapan'],
            ['location_name' => 'Site Project – Handil'],
            ['location_name' => 'Warehouse – Samboja'],
        ]);
    }
}
