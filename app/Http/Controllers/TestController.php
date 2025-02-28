<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test()
    {
        $user = User::find(2);
        dd($user->markedJobs);
        // $job = Job::find(3);
        // dd($job->ownerUsers);
    }

    public function applicantJob(Request $request)
    {
        dd($request->all());
    }
}
