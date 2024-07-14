<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['department_name' => 'Development', 'created_at' => Carbon::now()],
            ['department_name' => 'Quality Assurance (QA)', 'created_at' => Carbon::now()],
            ['department_name' => 'Product Management', 'created_at' => Carbon::now()],
            ['department_name' => 'Sales and Marketing', 'created_at' => Carbon::now()],
            ['department_name' => 'Customer Support', 'created_at' => Carbon::now()],
            ['department_name' => 'Human Resources', 'created_at' => Carbon::now()],
            ['department_name' => 'Finance and Administration', 'created_at' => Carbon::now()],
        ];
        DB::table('departments')->insert($data);
    }
}
