<?php

namespace App\Http\Controllers;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobPost::where('status', 1);

        if ($request->filled('keyword')) {
            $jobs->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('location')) {
            $jobs->where('location', 'like', '%' . $request->location . '%');
        }

        $jobs = $jobs->latest()->get();

        return view('jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = JobPost::where('slug', $slug)
            ->firstOrFail();

        return view('jobs.show', compact('job'));
    }
}
