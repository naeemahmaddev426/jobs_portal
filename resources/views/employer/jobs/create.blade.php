@extends('layouts.employer')

@section('content')
<style>
    .form-control:focus{
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        border-color: #007bff;
    }
</style>
<div class="container">
    <h2>Create Job</h2>

    <form action="{{ route('employer.jobs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Category</label>
            <select name="job_category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="mb-3">
            <label>Salary</label>
            <input type="number" step="0.01" name="salary" class="form-control">
        </div>

        <div class="mb-3">
            <label>Experience (Years)</label>
            <input type="number" name="experience" class="form-control">
        </div>

        <div class="mb-3">
            <label>Job Type</label>
            <select name="job_type" class="form-control">
                <option value="full_time">Full Time</option>
                <option value="part_time">Part Time</option>
                <option value="remote">Remote</option>
                <option value="internship">Internship</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                rows="5"
                class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">
            Create Job
        </button>

    </form>
</div>

@endsection