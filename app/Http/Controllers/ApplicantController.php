<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ApplicantController extends Controller
{
    //
    public function store(Request $request, Job $job): RedirectResponse
    {
        // get logged user
        $logged_user = Auth::user();
        // check if it's just exists a job applicant
        $existingApplicant = Applicant::where('job_listing_id', $job->id)
            ->where('user_id', $logged_user->id)->exists();
        // dd($existingApplicant);

        if ($existingApplicant) {
            return redirect()->back()
                ->with('message', 'You have just apply this job!')
                ->with('type', 'error');
        }

        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'required|string',
            'message' => 'required',
            'location' => 'required|string',
            'resume_path' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validatedData) {
            // store upload
            $path = $validatedData['resume_path']->store('resumes', 'public');
            // store in db
            $applicant = new Applicant();
            $applicant->user_id = $logged_user->id;
            $applicant->job_listing_id = $job->id;
            $applicant->full_name = $validatedData['full_name'];
            $applicant->contact_phone = $validatedData['contact_phone'];
            $applicant->contact_email = $validatedData['contact_email'];
            $applicant->message = $validatedData['message'];
            $applicant->location = $validatedData['location'];
            $applicant->resume_path = $path;
            $applicant->save();
            // redirect
            return redirect()->route('home')
                ->with('message', 'Applicant submitted successfully!')
                ->with('type', 'success');
        } else {
            return redirect()->route('home')
                ->with('message', 'Something goes wrong')
                ->with('type', 'error');
        }
    }

    public function destroy($id): RedirectResponse
    {
        // find instance
        $applicant = Applicant::findOrFail($id);
        // deleting applicant
        $applicant->delete();
        // redirect
        return redirect()->back()->with('message', 'Applicant deleted successfully')
            ->with('type', 'success');
    }
}
