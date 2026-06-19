<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
   
public function create(JobPost $job)
{
    return view('applications.create', compact('job'));
}
public function store(Request $request, JobPost $job)
{
    $request->validate([
        'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        'cover_letter' => 'nullable|string'
    ]);

    $cvPath = $request->file('cv')->store(
        'cvs',
        'public'
    );

    JobApplication::create([
        'user_id' => auth()->id(),
        'job_post_id' => $job->id,
        'cv' => $cvPath,
        'cover_letter' => $request->cover_letter,
        'status' => 'pending'
    ]);

    // Send confirmation email to candidate
    try {
        Mail::raw("Your application for {$job->title} has been received.", function ($msg) use ($request) {
            $msg->to($request->user()->email)->subject('Application Received');
        });
    } catch (\Exception $e) {
        // silent fail if mail not configured
    }

    return back()->with(
        'success',
        'Application submitted successfully.'
    );
}

}
