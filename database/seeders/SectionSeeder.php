<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('assets/dictionary/drc-sections.json'));
        $data = json_decode($json, true);

        foreach ($data as $section) {
            DB::table('sections')->insert([
                'section' => $section['section'],
                'index' => $section['index'],
                'country' => $section['country'],
            ]);
        }
    }
}
