<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('assets/dictionary/drc-locations.json'));
        $data = json_decode($json, true);

        foreach ($data as $location) {
            DB::table('locations')->insert([
                'location' => $location['location'],
                'index' => $location['index'],
                'section_id' => $location['section_id'],
                'latitude' => $location['latitude'],
                'longitude' => $location['longitude'],
            ]);
        }
    }
}
