<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Test Jobs found
        // dd($logged_user->jobs);

        // find logged user
        $user = Auth::user();
        // find his jobs
        $jobs = Job::where('user_id', $user->id)->get();
        // dd($jobs);

        return view('layout.dashboard', compact('user', 'jobs'));
    }
}
