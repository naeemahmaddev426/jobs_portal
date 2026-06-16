@extends('layouts.public')

@section('content')

<div class="container py-5">

<div class="row">

    <!-- Main Content -->
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <span class="badge bg-primary mb-3">
                    {{ ucfirst(str_replace('_',' ',$job->job_type)) }}
                </span>

                <h1 class="fw-bold">
                    {{ $job->title }}
                </h1>
                <p class="text-secondary">
                    🏢 {{ $job->company->company_name ?? 'Company Name' }}
                </p>

                <div class="mt-3">

                    <p class="mb-2">
                        📍 <strong>Location:</strong>
                        {{ $job->location }}
                    </p>

                    <p class="mb-2">
                        💰 <strong>Salary:</strong>
                        Rs {{ number_format($job->salary) }}
                    </p>

                    <p class="mb-2">
                        🎯 <strong>Experience:</strong>
                        {{ $job->experience }} Years
                    </p>

                    <p class="mb-2">
                        📅 <strong>Deadline:</strong>
                        {{ $job->deadline }}
                    </p>

                </div>

                <hr>

                <h4 class="fw-bold mb-3">
                    Job Description
                </h4>

                <p class="text-secondary">
                    {{ $job->description }}
                </p>

            </div>

        </div>

    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center">

                <h4 class="fw-bold">
                    Apply For This Job
                </h4>

                <p class="text-muted">
                    Submit your application now.
                </p>

                <a href="{{ route('jobs.apply.form',$job) }}"
                    class="btn btn-success w-100">
                        Apply Now
                </a>

            </div>

        </div>

        <div class="card border-0 shadow-sm mt-3">

            <div class="card-body">

                <h5 class="fw-bold">
                    Job Overview
                </h5>

                <hr>

                <p>
                    <strong>Type:</strong><br>
                    {{ ucfirst(str_replace('_',' ',$job->job_type)) }}
                </p>

                <p>
                    <strong>Location:</strong><br>
                    {{ $job->location }}
                </p>

                <p>
                    <strong>Experience:</strong><br>
                    {{ $job->experience }} Years
                </p>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
