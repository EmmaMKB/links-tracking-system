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

        $clients = Client::all();
        $locations = Location::all();
        $escorters = Employee::where('function', '!=', 'controller')->get();
        $controllers = Employee::where('function', 'controller')->get();
        $mines = Mine::orderBy('mine', 'asc')->get();
        $trucks = Truck::with('location')->where('status', '!=', 'Handover')->get();


        $klzi_to_likasi = Convoy::where('status', '!=', 'Handover')
        ->whereHas('location', function ($query) {
            $query->whereIn('section_id', [1,2]);
        })->get();

        $likasi_to_lushi = Convoy::where('status', '!=', 'Handover')
        ->whereHas('location', function ($query)  {
            $query->whereIn('section_id', [3,4]);
        })->get();

        $lubumbashi = Convoy::where('status', '!=', 'Handover')
        ->whereHas('location', function ($query) {
            $query->where('section_id', 5);
        })->get();

        $lshi_to_klsa = Convoy::where('status', '!=', 'Handover')
        ->whereHas('location', function ($query)  {
            $query->whereIn('section_id', [6]);
        })->get();

        $kasumbalesa = Convoy::where('status', '!=', 'Handover')
        ->whereHas('location', function ($query) {
            $query->whereIn('section_id', [7]);
        })->get();

        $klsa_to_sakania = Convoy::where('status', '!=', 'Handover')
        ->whereHas('location', function ($query) {
            $query->whereIn('section_id', [8, 9]);
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
            'lubumbashi' => $lubumbashi,
            'lshi_to_klsa' => $lshi_to_klsa,
            'kasumbalesa' => $kasumbalesa,
            'klsa_to_sakania' => $klsa_to_sakania,
        ]);
    }

    function create(Request $request)  {

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

    function update(Request $request) {

        if ($request->action == 'update') {
            $validatedData = $request->validate([
                'trucks' => 'required',
                'convoy_id' => 'required|exists:convoys,id',
                'escort_id' => 'required|exists:employees,id',
                'controller_id' => 'required|exists:employees,id',
                'location_id' => 'required|exists:locations,id',
                'status' => 'required|string',
            ]);

            $convoy = Convoy::find($validatedData['convoy_id']);
            $convoy->update($validatedData);
            $convoy->save();

            // Update the convoy status for each truck
            foreach ($validatedData['trucks'] as $key => $t) {

                $truck = Truck::find($t);
                $truck->location_id = $validatedData['location_id'];
                if ($validatedData['status'] == 'Handover') {
                    $truck->status = 'Parked';
                } else {
                    $truck->status = $validatedData['status'];
                }
                $truck->convoy_id = $validatedData['convoy_id'];
                $truck->updated_at = now();
                $truck->save();
            }

            return redirect()->back()->with('success', 'Convoy updated successfully');
        }
        if ($request->action == 'delete') {
            $convoy = Convoy::find($request->convoy_id);
            $convoy->delete();
            return redirect()->back()->with('success', 'Convoy deleted successfully');
        }
    }

}
