<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('assets/dictionary/mines.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('mines')->insert([
                'mine' => $item['mine'],
                'section_id' => $item['section_id'],
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
            ]);
        }
    }
}
