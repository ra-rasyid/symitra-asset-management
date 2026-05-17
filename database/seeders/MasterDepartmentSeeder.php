<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        \App\Models\MasterDepartment::insert([
            ['dept_name' => 'IT', 'dept_code' => 'IT01', 'remark' => 'Information Technology'],
            ['dept_name' => 'HRD', 'dept_code' => 'HR01', 'remark' => 'Human Resource'],
            ['dept_name' => 'Finance', 'dept_code' => 'FIN', 'remark' => 'Finance & Accounting'],
            ['dept_name' => 'Project', 'dept_code' => 'PRJ', 'remark' => 'Site Project'],
            ['dept_name' => 'BOD', 'dept_code' => 'BOD', 'remark' => 'BOD'],
            ['dept_name' => 'Asset', 'dept_code' => 'AST', 'remark' => 'Asset Management'],
            ['dept_name' => 'Procurement', 'dept_code' => 'PRC', 'remark' => "Procurement"],  
        ]);
    }
}
