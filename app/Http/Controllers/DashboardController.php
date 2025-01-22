<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Location;
use App\Models\Mine;
use App\Models\Truck;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();
        // $trucks = DB::table('trucks')->with('location')->where('status', '!=', 'Handover')->take(10)->get();
        $trucks = Truck::with('location')->where('status', '!=', 'Handover')->take(10)->get();
        return view('dashboard', [
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines,
            'trucks' => $trucks,
        ]);
    }

}
