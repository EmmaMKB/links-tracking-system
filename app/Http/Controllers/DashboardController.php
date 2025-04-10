<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Convoy;
use App\Models\Location;
use App\Models\Mine;
use App\Models\Truck;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();
        $transit = Truck::where('status', '!=', 'Handover')->get()->count();
        $convoys = Convoy::where('state', 'active')->get()->count();
        $breakdowns = Truck::where('status', 'Breakdown')->get()->count();
        $trucks = Truck::with('location')
        ->where('status', '!=', 'Handover')
        ->orderBy('location_id')
        ->take(20)->get();

        return view('dashboard', [
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
            'trucks' => $trucks,
            'transit' => $transit,
            'convoys' => $convoys,
            'breakdowns' => $breakdowns,
        ]);
    }

    function statistics() : View {
        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();

        return view('dashboard.statistics', [
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
        ]);
    }

}
