@extends('layouts.employer')

@section('content')

<div class="container">

    <h2>Edit Job</h2>

    <form action="{{ route('employer.jobs.update',$job->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text"
                name="title"
                value="{{ $job->title }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text"
                name="location"
                value="{{ $job->location }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Salary</label>
            <input type="number"
                name="salary"
                value="{{ $job->salary }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Experience</label>
            <input type="number"
                name="experience"
                value="{{ $job->experience }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Job Type</label>

            <select name="job_type" class="form-control">

                <option value="full_time"
                    {{ $job->job_type == 'full_time' ? 'selected' : '' }}>
                    Full Time
                </option>

                <option value="part_time"
                    {{ $job->job_type == 'part_time' ? 'selected' : '' }}>
                    Part Time
                </option>

                <option value="remote"
                    {{ $job->job_type == 'remote' ? 'selected' : '' }}>
                    Remote
                </option>
                <option value="internship"
                    {{ $job->job_type == 'internship' ? 'selected' : '' }}>
                    Internship
                </option>

            </select>

        </div>

        <div class="mb-3">
            <label>Deadline</label>

            <input type="date"
                name="deadline"
                value="{{ $job->deadline }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>

            <textarea name="description"
                rows="5"
                class="form-control">{{ $job->description }}</textarea>
        </div>

        <button class="btn btn-primary">
            Update Job
        </button>

    </form>

</div>

@endsection