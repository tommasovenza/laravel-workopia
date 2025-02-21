<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    // Return Home View
    public function show_home()
    {
        $jobs = Job::limit(6)->orderBy('id', 'desc')->get();
        return view('layout.home', compact('jobs'));
    }

    // Indexing Jobs
    public function index()
    {
        $listings = Job::paginate(6);
        return view('layout.index', compact('listings'));
    }

    // Create => show form to create a new Job resource
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

        // if there is a logo
        if ($request->file('company_logo') !== null) {
            // upload inside logos folder in storage/public
            $path = $request->file('company_logo')->store('logos', 'public');
            // Storing company logo path in Database
            $validated_data['company_logo'] = $path;
        }
        // Setting a new user
        $validated_data['user_id'] = auth()->user()->id;

        // create new Job
        Job::create($validated_data);

        // redirect
        return redirect()->route('index')
            ->with('message', 'Job created successfully!')
            ->with('type', 'success');
    }

    // Edit => show form for editing a Single Job
    public function edit(Job $job)
    {
        // testing authorization
        $this->authorize('update', $job);

        return view('layout.edit', compact('job'));
    }

    // Updating a Job
    public function update(Request $request, Job $job)
    {
        // Authorizing Job 
        $this->authorize('update', $job);

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

        // if there's a new logo
        if (isset($validated_data['company_logo'])) {
            // delete old logo
            Storage::disk('public')->delete($job->company_logo);
            // upload inside logos folder in storage/public
            $path = $request->file('company_logo')->store('logos', 'public');
            // storing company logo path in database
            $validated_data['company_logo'] = $path;
        }
        // create new Job
        $job->update($validated_data);

        return redirect()->route('index')
            ->with('message', 'Job updated successfully!')
            ->with('type', 'success');
    }
    // Delete Job
    public function destroy(Job $job)
    {
        // Authorizing Job
        $this->authorize('delete', $job);

        // check for query params
        $param = request()->query('from-dashboard');

        // check if logo exist
        if (isset($job['company_logo'])) {
            // delete path
            Storage::disk('public')->delete($job->company_logo);
        }
        // delete job
        $job->delete();

        if ($param === "yes") {
            return redirect()->route('dashboard-index')->with('message', 'Job deleted successfully')->with('type', 'success');
        }

        return redirect()->route('index')->with('message', 'Job deleted successfully')->with('type', 'success');
    }

    // Show Single Jobs
    public function show(Job $job)
    {
        if (isset($job)) {
            return view('layout.show', compact('job'));
        } else {
            abort(404);
        }
    }
}
