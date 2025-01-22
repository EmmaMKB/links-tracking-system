<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Location;
use App\Models\Mine;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $locations = Location::all();
        $mines = Mine::orderBy('mine', 'asc')->get();

        return view('dashboard', [
            'clients' => $clients,
            'locations' => $locations,
            'mines' => $mines
        ]);
    }

}
