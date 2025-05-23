<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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
            ->get()
            ->sortBy('location.index');

        $client = Truck::where('client_id', $request->client_id)->first();

        $totalTrucks = $trucks->count();

        $groupedTrucks = $trucks->groupBy(function ($truck) {
            return $truck->location->section->id ?? 'Unknown Section';
        });

        return view('reports.tracking', [
            'trucks' => $groupedTrucks,
            'transit' => $totalTrucks,
            'client' => $client,
        ]);

    }

    function download($client_id) {
        $client = Truck::where('client_id', $client_id)->first();

        $trucks = Truck::with('location.section')
            ->where('status', '!=', 'Handover')
            ->where('client_id', $client_id)
            ->get()
            ->sortBy('location.index');

        $imagePath = public_path('assets/media/logos/links-blue.png'); // Path to your image
        $imageData = base64_encode(file_get_contents($imagePath)); // Convert image to Base64
        $imageBase64 = 'data:image/png;base64,' . $imageData;

        $totalTrucks = $trucks->count();

        $groupedTrucks = $trucks->groupBy(function ($truck) {
            return $truck->location->section->id ?? 'Unknown Section';
        });

        $pdf = Pdf::loadView('reports.report', [
            'trucks' => $groupedTrucks,
            'transit' => $totalTrucks,
            'client' => $client,
            'image' => $imageBase64,
        ]);

        $pdf->setPaper('A4', 'landscape');
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->setWarnings(false);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isRemoteEnabled', false);
        $pdf->setOption('isPhpEnabled', true);
        $pdf->setOption('isFontSubsettingEnabled', true);
        $date = Carbon::now()->format('d-m-Y');
        return $pdf->download($client->client->client.' Tracking Report '.$date.'.pdf');
    }

    function global_update(Request $request) {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
        ]);

        $trucks = Truck::with('location.section')
            ->where('status', '!=', 'Handover')
            ->where('client_id', $request->client_id)
            ->get()
            ->sortByDesc(function ($truck) {
                return $truck->location->index ?? 'Unknown Location'; // Sort by location
            });;

        $client = Truck::where('client_id', $request->client_id)->first();

        $totalTrucks = $trucks->count();

        $groupedTrucks = $trucks->groupBy(function ($truck) {
            return $truck->location->location ?? 'Unknown Location';
        })->map(function ($locationGroup) {
            return $locationGroup->groupBy(function ($truck) {
                return $truck->mine->mine ?? 'Unknown Mine';
            });
        });

        return view('reports.global-update', [
            'trucks' => $groupedTrucks,
            'transit' => $totalTrucks,
            'client' => $client,
        ]);
    }
}
