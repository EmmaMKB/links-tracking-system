<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('assets/dictionary/clients.json'));
        $data = json_decode($json, true);

        foreach ($data as $client) {
            Client::create([
                'client' => $client['client'],
                'comment' => $client['comment'],
            ]);
        }
    }
}
