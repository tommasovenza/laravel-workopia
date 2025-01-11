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

    // Show Single Jobs
    public function show($id)
    {
        $job = Listing::find($id);

        return view('layout.show', compact('job'));
    }
}
