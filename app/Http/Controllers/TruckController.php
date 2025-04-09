<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;
use App\Models\Location;
use App\Models\Mine;

class TruckController extends Controller
{

    function index() : View {

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

    function trucks_drc() : View {

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

    function edit_truck(Request $request) {

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
}
