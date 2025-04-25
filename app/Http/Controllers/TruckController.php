<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\Location;
use App\Models\Mine;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TruckController extends Controller
{

    function index(): View
    {

        $trucks = Truck::where('status', '!=', 'Handover')->get();

        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();

        return view('trucks.index', [
            'trucks' => $trucks,
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
        ]);
    }

    function breakdowns() : View
    {
        $trucks = Truck::where('status', '!=', 'Handover')
            ->where('status', 'BreakDown')
            ->get();

        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();

        return view('trucks.breakdowns', [
            'trucks' => $trucks,
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
        ]);

    }

    function trucks_drc(): View
    {

        $trucks = Truck::where('status', '!=', 'Handover')
            ->whereHas('location.section', function ($query) {
                $query->where('country', 'DRC');
            })
            ->get();
        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();

        return view('trucks.drcroutes', [
            'trucks' => $trucks,
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
        ]);
    }

    function add_truck(Request $request)
    {


        $validatedData = $request->validate([
            'horse' => 'required|string|unique:trucks,horse',
            'trailer' => 'nullable|string|unique:trucks,trailer',
            'transporter' => 'required|string',
            'dispatch_date' => 'required|date',
            'mine_id' => 'required|exists:mines,id',
            'driver' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'nullable|string',
            'comment' => 'nullable|string',
            'destination' => 'nullable|string',
        ]);

        Truck::create($validatedData);

        return redirect()->back()->with('success', 'Truck added successfully');
    }

    function edit_truck(Request $request)
    {

        if ($request->action == "update") {
            $validatedData = $request->validate([
                'id' => 'required|exists:trucks,id',
                'horse' => 'required|string',
                'trailer' => 'nullable|string',
                'transporter' => 'required|string',
                'dispatch_date' => 'required|date',
                'mine_id' => 'required|exists:mines,id',
                'driver' => 'nullable|string',
                'client_id' => 'required|exists:clients,id',
                'location_id' => 'required|exists:locations,id',
                'status' => 'required|string',
                'comment' => 'nullable|string',
                'destination' => 'nullable|string',
            ]);
            $truck = Truck::find($validatedData['id']);
            $truck->update($validatedData);
            $truck->save();
            return redirect()->back()->with('success', 'Truck updated successfully');
        }
        if ($request->action == "delete") {
            $validatedData = $request->validate([
                'id' => 'required|exists:trucks,id',
            ]);
            $truck = Truck::find($validatedData['id']);
            $truck->delete();
            return redirect()->back()->with('success', 'Truck deleted successfully');
        }
    }

    function import(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file')->getRealPath();

        // Load the spreadsheet
        $spreadsheet = IOFactory::load($file);

        // Get the first worksheet
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet = IOFactory::load($file);

        // Get the first worksheet
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestDataRow();

        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = [];

            // Loop through columns in the current row
            foreach ($sheet->getRowIterator($row, $row) as $rowIterator) {
                $cellIterator = $rowIterator->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
                }
            }
            $location = Location::where('location', $rowData[5])->first();
            $mine = Mine::where('mine', $rowData[4])->first();
            $client_id = Client::where('client', $rowData[3])->first();

            Truck::create([
                'horse' => $rowData[0],
                'trailer' => $rowData[1],
                'transporter' => $rowData[2],
                'dispatch_date' => Date::excelToDateTimeObject($rowData[6])->format('Y-m-d'),
                'mine_id' => $mine->id,
                'client_id' => $client_id->id,
                'location_id' => $location->id,
                'comment' => $rowData[7],
            ]);

        }
        return redirect()->back()->with('success', 'Trucks imported successfully');
    }
}
