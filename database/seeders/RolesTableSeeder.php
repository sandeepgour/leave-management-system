<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'super-admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'technical-leader',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'employees',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
