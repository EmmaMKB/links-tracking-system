<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('assets/dictionary/groundteam.json'));
        $data = json_decode($json, true);

        foreach ($data as $employee) {
            DB::table('employees')->insert([
                'employee_id' => $employee['employee_id'],
                'full_name' => $employee['full_name'],
                'function' => $employee['function'],
                'uuid' => (string) Str::uuid(),
                'hire_date' => '2025-01-01',
            ]);
        }
    }
}
