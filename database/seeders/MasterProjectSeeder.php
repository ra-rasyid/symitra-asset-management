<?php

namespace Database\Seeders;

use App\Models\MasterProject;
use Illuminate\Database\Seeder;

class MasterProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['project_code' => 'CSPB', 'project_name' => 'CSPB'],
            ['project_code' => 'CWSR', 'project_name' => 'CWSR'],
            ['project_code' => 'HO', 'project_name' => 'HO'],
        ];

        foreach ($projects as $project) {
            MasterProject::updateOrCreate(
                ['project_code' => $project['project_code']],
                ['project_name' => $project['project_name']]
            );
        }
    }
}
