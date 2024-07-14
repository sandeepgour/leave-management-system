<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class LeaveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['leave_type_name' => 'Earned Leave (EL)', 'leave_days' => '10', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Casual Leave (CL)', 'leave_days' => '10', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Sick Leave (SL)', 'leave_days' => '10', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Bereavement Leave (BL)', 'leave_days' => '3', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Paternity Leave (PL)', 'leave_days' => '5', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Maternity Leave (ML)', 'leave_days' => '5', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Birthday/Anniversary Leave (B/AL)', 'leave_days' => '1', 'created_at' => Carbon::now()],
            ['leave_type_name' => 'Birthday', 'leave_days' => '1', 'created_at' => Carbon::now()],
        ];
        DB::table('leave_types')->insert($data);
    }
}
