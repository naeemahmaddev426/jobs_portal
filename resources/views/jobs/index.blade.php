@extends('layouts.public')

@section('content')

<!-- Hero Section -->

<section class="bg-primary text-white py-5 rounded-4 mb-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">
            Find Your Dream Job Today
        </h1>

    <p class="lead mt-3">
        Discover opportunities from top companies around Pakistan
    </p>

    <form action="{{ route('jobs.list') }}" method="GET">

        <div class="row justify-content-center mt-4">

            <div class="col-md-4">
                <input type="text"
                    name="keyword"
                    class="form-control form-control-lg"
                    placeholder="Job title"
                    value="{{ request('keyword') }}">
            </div>

            <div class="col-md-3">
                <input type="text"
                    name="location"
                    class="form-control form-control-lg"
                    placeholder="Location"
                    value="{{ request('location') }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-warning btn-lg w-100">
                    Search
                </button>
            </div>

        </div>

    </form>
</div>

</section>

<!-- Stats -->

<div class="row text-center mb-5">

<div class="col-md-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold text-primary">1000+</h2>
            <p>Active Jobs</p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold text-success">500+</h2>
            <p>Companies</p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold text-danger">2000+</h2>
            <p>Candidates</p>
        </div>
    </div>
</div>

</div>

<!-- Jobs Section -->

<h2 class="fw-bold mb-4">
    Featured Jobs
</h2>

<div class="row">

@foreach($jobs as $job)

<div class="col-lg-6 col-xl-4 mb-4">

<div class="card border-0 shadow h-100">

    <div class="card-body">

        <span class="badge bg-primary mb-2">
            {{ ucfirst(str_replace('_',' ',$job->job_type)) }}
        </span>

        <h4 class="fw-bold">
            {{ $job->title }}
        </h4>
        <p class="text-muted mb-2">
            🏢 {{ $job->company->company_name ?? 'Company Name' }}
        </p>

        <p class="text-muted mb-2">
            📍 {{ $job->location }}
        </p>

        <p class="fw-semibold text-success">
            Rs {{ number_format($job->salary) }}
        </p>

        <a href="{{ route('jobs.show',$job->slug) }}"
           class="btn btn-outline-primary">

            View Details

        </a>

    </div>

</div>


</div>

@endforeach

</div>

@endsection
