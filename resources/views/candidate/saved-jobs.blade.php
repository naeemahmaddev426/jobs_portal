@extends('layouts.public')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <div class="dashboard-sidebar">
            <div class="profile-card-mini">
                <div class="profile-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <h6 class="mt-3">{{ auth()->user()->name }}</h6>
                <p class="text-muted small">Candidate</p>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('candidate.profile') }}" class="menu-item">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <a href="{{ route('candidate.applications') }}" class="menu-item">
                    <i class="fas fa-file-alt"></i> My Applications
                </a>
                <a href="{{ route('candidate.saved-jobs') }}" class="menu-item active">
                    <i class="fas fa-bookmark"></i> Saved Jobs
                </a>
                <a href="{{ route('candidate.resume') }}" class="menu-item">
                    <i class="fas fa-file-pdf"></i> Resume
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Saved Jobs</h1>
                <p class="text-muted">Jobs you've bookmarked for later</p>
            </div>

            <div class="saved-jobs-list">
                php artisan migrate                @forelse($savedJobs as $savedJob)
                    @php $job = $savedJob->job; @endphp
                    <div class="saved-job-card">
                        <div class="job-logo">{{ strtoupper(substr($job->company->company_name ?? 'Job', 0, 2)) }}</div>
                        <div class="job-details">
                            <h5>{{ $job->title }}</h5>
                            <p class="company-name">{{ $job->company->company_name ?? 'Company' }}</p>
                            <div class="job-meta">
                                <span><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</span>
                                <span><i class="fas fa-briefcase"></i> {{ ucfirst(str_replace('_', ' ', $job->job_type)) }}</span>
                                <span><i class="fas fa-dollar-sign"></i> Rs {{ number_format($job->salary) }}</span>
                            </div>
                        </div>
                        <div class="job-date">
                            <p class="text-muted">Saved {{ $savedJob->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="job-actions">
                            <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-sm btn-primary">Apply Now</a>
                            <form method="POST" action="{{ route('jobs.save', $job->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove from saved">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>                            php artisan storage:link                            php artisan storage:link
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-bookmark"></i>
                        <h4>No saved jobs yet</h4>
                        <p>Save jobs to review them later</p>
                        <a href="{{ route('jobs.list') }}" class="btn btn-primary mt-3">Browse Jobs</a>
                    </div>
                @endforelse

                @if($savedJobs->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $savedJobs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.saved-jobs-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.saved-job-card {
    display: grid;
    grid-template-columns: 60px 1fr auto auto;
    gap: 1.5rem;
    align-items: center;
    padding: 1.5rem;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    transition: all 0.25s ease;
}

.saved-job-card:hover {
    background: #f8f9fa;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
    border-color: #2563eb;
}

.job-logo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
}

.job-details h5 {
    margin: 0 0 0.5rem 0;
    font-size: 16px;
    color: #0f172a;
    font-weight: 600;
}

.company-name {
    margin: 0 0 1rem 0;
    font-size: 14px;
    color: #64748b;
    font-weight: 500;
}

.job-meta {
    display: flex;
    gap: 1.5rem;
    font-size: 13px;
    color: #94a3b8;
}

.job-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.job-date p {
    margin: 0;
}

.job-actions {
    display: flex;
    gap: 0.5rem;
}

@media (max-width: 991px) {
    .saved-job-card {
        grid-template-columns: 50px 1fr;
        gap: 1rem;
    }

    .job-date,
    .job-actions {
        grid-column: 1 / -1;
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 1rem;
    }

    .job-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>
@endsection
