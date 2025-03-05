<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class ApplicantController extends Controller
{
    //
    public function store(Request $request, Job $job)
    {
        dd($request->all());
    }
}
