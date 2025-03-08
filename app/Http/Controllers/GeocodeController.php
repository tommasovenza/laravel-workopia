<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    //
    public function geocode(Request $request)
    {
        // getting address from POST Fetch API
        $address = $request['address'];

        // encode address before calling MAPBOX from Backend
        $encodedAddress = urlencode($address);

        $response = Http::get("https://api.mapbox.com/geocoding/v5/mapbox.places/{$encodedAddress}.json", [
            'access_token' => env('MAPBOX_API_KEY'),
        ]);

        return response()->json($response->json());
    }
}
