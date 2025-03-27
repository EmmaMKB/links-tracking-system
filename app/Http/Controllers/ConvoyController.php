<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convoy;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Mine;
use App\Models\Truck;
use Illuminate\Support\Str;

class ConvoyController extends Controller
{
    function drc_routes() : View {

        $convoys = Convoy::where('status', '!=', 'handover')->get();
        $clients = Client::all();
        $locations = Location::all();
        $escorters = Employee::where('function', '!=', 'controller')->get();
        $controllers = Employee::where('function', 'controller')->get();
        $mines = Mine::orderBy('mine', 'asc')->get();
        $trucks = Truck::with('location')->where('status', '!=', 'Handover')->take(10)->get();

        // $klzi_to_likasi = Convoy::with('location')
        // ->where('status', '!=', 'Handover')
        // ->where('location_id', 1)
        // ->with('Trucks')->get();


        $klzi_to_likasi = Convoy::whereHas('location', function ($query) {
            $query->where('section_id', 2);
        })->get();

        $likasi_to_lushi = Convoy::whereHas('location', function ($query)  {
            $query->whereIn('section_id', [3,4]);
        })->get();

        return view('convoys.drcroutes', [
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
            'trucks' => $trucks,
            'escorts' => $escorters,
            'controllers' => $controllers,
            'klzi_to_likasi' => $klzi_to_likasi,
            'likasi_to_lushi' => $likasi_to_lushi,
        ]);
    }

    function add_convoy(Request $request)  {

        $validatedData = $request->validate([
            'trucks' => 'required',
            'escort_id' => 'required|exists:employees,id',
            'controller_id' => 'required|exists:employees,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string',
        ]);

        $validatedData['uuid'] = (string) Str::uuid();

        $convoy = Convoy::create($validatedData);

        foreach ($validatedData['trucks'] as $key => $t) {
            $truck = Truck::find($t);
            $truck->location_id = $validatedData['location_id'];
            $truck->status = $validatedData['status'];
            $truck->convoy_id = $convoy->id;
            $truck->save();
        }

        return redirect()->back()->with('success', 'Convoy created successfully');
    }
}
