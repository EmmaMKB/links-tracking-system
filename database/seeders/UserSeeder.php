<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['name' => 'Operations', 'email' => 'operations@linkslogistics.co.za', 'password' => bcrypt('linkslog_12#')]);
    }
}
