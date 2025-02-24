<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;

class BookmarkController extends Controller
{
    //
    public function store(Job $job): RedirectResponse
    {
        // get user
        $user = Auth::user();

        // if relation exists...
        if ($user->markedJobs()->where('job_listing_id', $job->id)->exists()) {

            // ...exit from store function because job is already store into database, 
            // so it has just been saved from user 
            // NB: $job->pivot->job_listing_id this returns relations from pivot table
            return redirect()->back()
                ->with('message', 'Job already saved')
                ->with('type', 'error');
        }
        // storing new relation between user and job
        $user->markedJobs()->attach($job->id);

        // redirect home
        return redirect()->route('home')
            ->with('message', 'Job saved successfully!')
            ->with('type', 'success');
    }
}
