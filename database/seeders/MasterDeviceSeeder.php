<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        \App\Models\MasterHardwareDevice::insert([
            ['device_name' => 'Notebook'],
            ['device_name' => 'CPU'],
            ['device_name' => 'Monitor'],
            ['device_name' => 'Printer'],
            ['device_name' => 'Copier'],
            ['device_name' => 'Router'],
        ]);
    }
}
