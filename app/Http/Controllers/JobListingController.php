<?php

namespace App\Http\Controllers;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobPost::where('status', 1)
            ->latest()
            ->get();

        return view('jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = JobPost::where('slug', $slug)
            ->firstOrFail();

        return view('jobs.show', compact('job'));
    }
}
