<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convoy;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\Location;
use App\Models\Mine;
use App\Models\Truck;

class ConvoyController extends Controller
{
    function drc_routes() : View {

        $convoys = Convoy::where('status', '!=', 'handover')->get();
        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();
        $trucks = Truck::with('location')->where('status', '!=', 'Handover')->take(10)->get();

        return view('convoys.drcroutes', [
            'convoys' => $convoys,
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
            'trucks' => $trucks,
        ]);
    }
}
