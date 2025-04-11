<?php

namespace App\Imports;

use App\Models\Truck;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Readers\LaravelExcelReader;

class TrucksImport implements ToCollection
{
    public function model(Collection $rows) {

        foreach ($rows as $row) {
            dd($row); // Debug the row data
        }

        // if ($row[0] === 'Horse') {
        //     return null;
        // }

        // Map the row data to the Truck model
        // return new Truck([
        //     'horse' => $row[0],
        //     'trailer' => $row[1],
        //     'transporter' => $row[2],
        //     'client_id' => $row[6],
        //     'mine_id' => $row[4],
        //     'location_id' => $row[6],
        //     'dispatch_date' => $row[6],
        //     'comment' => $row[7],
        // ]);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Process each row
            dd($row); // Debug the row data
        }
    }
}
