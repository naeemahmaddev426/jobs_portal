@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start gap-4 mb-4">
                        <div class="company-header-logo">
                            {{ strtoupper(substr($company->name, 0, 2)) }}
                        </div>
                        <div>
                            <h1 class="mb-2">{{ $company->name }}</h1>
                            @if($company->website)
                                <p class="mb-1">
                                    <a href="{{ $company->website }}" target="_blank" class="text-primary">
                                        <i class="fas fa-globe"></i> {{ $company->website }}
                                    </a>
                                </p>
                            @endif
                            @if($company->location)
                                <p class="mb-0 text-muted">
                                    <i class="fas fa-map-marker-alt"></i> {{ $company->location }}
                                </p>
                            @endif
                        </div>
                    </div>

                    @if($company->description)
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">About Company</h5>
                            <p class="text-secondary">{{ $company->description }}</p>
                        </div>
                    @endif

                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="bg-light p-3 rounded text-center">
                                <h3 class="text-primary mb-1">{{ $jobs->total() }}</h3>
                                <small class="text-muted">Active Jobs</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-light p-3 rounded text-center">
                                <h3 class="text-success mb-1">{{ $company->jobs()->count() }}</h3>
                                <small class="text-muted">Total Posted</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-light p-3 rounded text-center">
                                <h3 class="text-info mb-1">{{ now()->format('Y') }}</h3>
                                <small class="text-muted">Since {{ $company->created_at->format('Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="fw-bold mb-4">Open Positions</h5>
                    <h2 class="text-primary mb-4">{{ $jobs->total() }}</h2>
                    <p class="text-muted mb-0">Discover career opportunities at {{ $company->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Jobs Listing -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="fw-bold mb-4">Open Jobs at {{ $company->name }}</h3>

            @forelse($jobs as $job)
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h5 class="fw-bold mb-2">{{ $job->title }}</h5>
                                <div class="job-meta">
                                    <span class="badge bg-primary me-2">{{ ucfirst(str_replace('_', ' ', $job->job_type)) }}</span>
                                    <span class="text-muted">
                                        <i class="fas fa-map-marker-alt"></i> {{ $job->location }}
                                    </span>
                                    <span class="text-muted ms-3">
                                        <i class="fas fa-briefcase"></i> {{ $job->experience }}+ years
                                    </span>
                                </div>
                                <p class="text-secondary mt-2 mb-0">{{ substr($job->description, 0, 150) }}...</p>
                            </div>
                            <div class="col-lg-4 text-end">
                                <p class="fw-semibold text-success mb-3">Rs {{ number_format($job->salary) }}</p>
                                <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-primary btn-sm">View & Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-briefcase" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem; display: block;"></i>
                        <h5 class="text-muted">No Open Positions</h5>
                        <p class="text-muted">Check back soon for new opportunities at {{ $company->name }}</p>
                    </div>
                </div>
            @endforelse

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</div>

<style>
.company-header-logo {
    width: 100px;
    height: 100px;
    border-radius: 12px;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    font-weight: bold;
    flex-shrink: 0;
}

.job-meta {
    font-size: 14px;
    color: #64748b;
}
</style>
@endsection
