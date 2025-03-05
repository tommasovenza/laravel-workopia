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
        // find logged user
        $user = Auth::user();
        // find his jobs with applicants related // NB. => see Job Model relations
        $jobs = Job::where('user_id', $user->id)->with('applicants')->get();
        // dd($jobs);

        return view('layout.dashboard', compact('user', 'jobs'));
    }
}
