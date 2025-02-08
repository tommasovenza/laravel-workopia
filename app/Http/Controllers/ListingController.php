<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{

    // Return Home View
    public function show_home()
    {
        $jobs = Listing::limit(6)->orderBy('id', 'desc')->get();
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
            'title' => 'required|string',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable',
            'benefits' => 'nullable',
            'job_type' => 'required',
            'remote' => 'required',
            'tags' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'company_name' => 'required',
            'company_description' => 'required',
            'company_website' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'company_logo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload inside logos folder in storage/public
        $path = $request->file('company_logo')->store('logos', 'public');

        // Storing company logo path in Database
        $validated_data['company_logo'] = $path;

        // Setting a new user
        $validated_data['user_id'] = auth()->user()->id;

        // create new listing
        Listing::create($validated_data);

        return redirect()->route('index')
            ->with('message', 'Job created successfully!')
            ->with('type', 'success');
    }

    // Edit => show form for editing a Single Job
    public function edit($id)
    {
        $job = Listing::find($id);
        return view('layout.edit', compact('job'));
    }

    // Updating a Job
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable',
            'benefits' => 'nullable',
            'job_type' => 'required',
            'remote' => 'required',
            'tags' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'company_name' => 'required',
            'company_description' => 'required',
            'company_website' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'company_logo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);
        // Job Instance
        $listing_to_update = Listing::find($id);

        // if there's a new logo
        if (isset($validated_data['company_logo'])) {
            // delete old logo
            Storage::disk('public')->delete($listing_to_update->company_logo);
            // upload inside logos folder in storage/public
            $path = $request->file('company_logo')->store('logos', 'public');
            // storing company logo path in database
            $validated_data['company_logo'] = $path;
        }
        // create new listing
        $listing_to_update->update($validated_data);

        return redirect()->route('index')
            ->with('message', 'Job updated successfully!')
            ->with('type', 'success');
    }
    // Delete Job
    public function destroy($id)
    {
        // find job to delete
        $job_to_delete = Listing::find($id);
        // check if logo exist
        if (isset($job_to_delete['company_logo'])) {
            // delete path
            Storage::disk('public')->delete($job_to_delete->company_logo);
        }
        // delete job
        $job_to_delete->delete();

        return redirect()->route('index')->with('message', 'Job deleted successfully')->with('type', 'success');
    }

    // Show Single Jobs
    public function show($id)
    {
        $job = Listing::find($id);
        return view('layout.show', compact('job'));
    }
}
