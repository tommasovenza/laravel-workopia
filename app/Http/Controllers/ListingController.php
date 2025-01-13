<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    // Return Home View
    public function show_home()
    {
        $jobs = Listing::all();
        return view('layout.home', compact('jobs'));
    }

    // Indexing Jobs
    public function index()
    {
        $listings = Listing::all();

        return view('layout.index', compact('listings'));
    }

    // Create => show form to create a new listing resource
    public function create()
    {
        return view('layout.create');
    }

    // Store => make validation and store a new job into DB
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'company_name' => 'required',
            'company_website' => 'required',
            'company_phone' => 'required',
        ]);

        if ($validated_data) {
            dd('ok');
        } else {
            dd('not validated');
        }
    }

    // Show Single Jobs
    public function show($id)
    {
        $job = Listing::find($id);

        return view('layout.show', compact('job'));
    }
}
