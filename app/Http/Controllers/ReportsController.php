<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    function tracking(Request $request) {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
        ]);

        $trucks = Truck::with('location.section')
            ->where('status', '!=', 'Handover')
            ->where('client_id', $request->client_id)
            ->get();

        $client = Truck::where('client_id', $request->client_id)->first();

        $totalTrucks = $trucks->count();

        $groupedTrucks = $trucks->groupBy(function ($truck) {
            return $truck->location->section->section ?? 'Unknown Section';
        });

            // dd($trucks);
        return view('reports.tracking', [
            'trucks' => $groupedTrucks,
            'transit' => $totalTrucks,
            'client' => $client,
        ]);

    }
}
