<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['status_name' => 'Normal (stock)'],
            ['status_name' => 'Normal (in use)'],
            ['status_name' => 'Maintenance'],
            ['status_name' => 'Broken'],
        ];

        foreach ($statuses as $status) {
            \App\Models\MasterStatus::firstOrCreate($status);
        }
    }
}
