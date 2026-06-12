<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
   

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

    return back()->with(
        'success',
        'Application submitted successfully.'
    );
}

}
