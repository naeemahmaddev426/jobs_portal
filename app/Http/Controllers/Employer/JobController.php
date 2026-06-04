<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\JobPost;

class JobController extends Controller
{
    public function index()
    {
        $jobs = auth()->user()
            ->company
            ->jobs()
            ->latest()
            ->get();

        return view('employer.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = JobCategory::all();

        return view('employer.jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_category_id' => 'required',
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'salary' => 'nullable|numeric',
            'experience' => 'required|integer',
            'job_type' => 'required',
            'deadline' => 'required|date',
            'description' => 'required',
        ]);

        auth()->user()->company->jobs()->create([
            'job_category_id' => $validated['job_category_id'],
            'title' => $validated['title'],
            'slug' => \Str::slug($validated['title']) . '-' . time(),
            'description' => $validated['description'],
            'location' => $validated['location'],
            'salary' => $validated['salary'],
            'experience' => $validated['experience'],
            'job_type' => $validated['job_type'],
            'deadline' => $validated['deadline'],
            'status' => true,
        ]);

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job Created Successfully');
    }
    public function edit(JobPost $job)
    {
        return view('employer.jobs.edit', compact('job'));
    }
    public function update(Request $request, JobPost $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'deadline' => $request->deadline,
        ]);

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job Updated Successfully');
    }
    public function destroy(JobPost $job)
    {
        $job->delete();

        return redirect()
            ->route('employer.jobs.index')
            ->with('success', 'Job Deleted Successfully');
    }
}