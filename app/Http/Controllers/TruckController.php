<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TruckController extends Controller
{

    function index() : View {

        $trucks = Truck::where('status', '!=', 'Handover')->get();

        return view('trucks.index', [
            'trucks' => $trucks
        ]);
    }

    function trucks_drc() : View {
        
        $trucks = Truck::where('status', 'Handover')->get();

        return view('trucks.drcroutes', [
            'trucks' => $trucks
        ]);
    }

    function add_truck(Request $request)  {


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
}
