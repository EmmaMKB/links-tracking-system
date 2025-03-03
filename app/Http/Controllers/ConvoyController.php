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
use App\Models\ConvoyTruck;
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

        return view('convoys.drcroutes', [
            'convoys' => $convoys,
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
            'trucks' => $trucks,
            'escorts' => $escorters,
            'controllers' => $controllers
        ]);
    }

    function add_convoy(Request $request)  {

        // dd($request->post());die;

        $validatedData = $request->validate([
            'trucks' => 'required',
            'escort_id' => 'required|exists:employees,id',
            'controller_id' => 'required|exists:employees,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string',
        ]);
        $validatedData['uuid'] = (string) Str::uuid();

        $convoy = Convoy::create($validatedData);

        foreach ($validatedData['trucks'] as $key => $truck) {
            ConvoyTruck::create([
                'convoy_id' => $convoy->id,
                'truck_id' => $truck
            ]);
        }

        return redirect()->back()->with('success', 'Convoy created successfully');
    }
}
