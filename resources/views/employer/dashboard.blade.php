@extends('layouts.employer')

@section('content')
<div class="dashboard-main">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Employer Dashboard</h1>
            <p class="text-muted mb-0">Manage your job postings and applicants in one place.</p>
        </div>
        <div>
            <span class="badge bg-primary py-2 px-3 text-uppercase fs-6">{{ $company ? $company->name : 'No Company Created' }}</span>
        </div>
    </div>

    <div class="stats-grid mb-4">
        <div class="stat-card">
            <div class="stat-card-icon stat-icon-blue"><i class="fas fa-briefcase"></i></div>
            <div>
                <small class="text-uppercase text-secondary">Active Jobs</small>
                <h2 class="mt-2 mb-1">{{ $jobs->count() }}</h2>
                <p class="text-muted mb-0">Open listings from your company.</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-icon stat-icon-green"><i class="fas fa-file-alt"></i></div>
            <div>
                <small class="text-uppercase text-secondary">Total Applications</small>
                <h2 class="mt-2 mb-1">{{ $applications->count() }}</h2>
                <p class="text-muted mb-0">Submitted across all your jobs.</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-icon stat-icon-gold"><i class="fas fa-star"></i></div>
            <div>
                <small class="text-uppercase text-secondary">Shortlisted</small>
                <h2 class="mt-2 mb-1">{{ $applications->where('status', 'shortlisted')->count() }}</h2>
                <p class="text-muted mb-0">Candidates marked for review.</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-icon stat-icon-purple"><i class="fas fa-check"></i></div>
            <div>
                <small class="text-uppercase text-secondary">Hired</small>
                <h2 class="mt-2 mb-1">{{ $applications->where('status', 'hired')->count() }}</h2>
                <p class="text-muted mb-0">Successful hires from your listings.</p>
            </div>
        </div>
    </div>

    <div class="dashboard-section mb-4">
        <div class="section-header d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Recent Job Postings</h4>
                <p class="text-muted mb-0">Your latest job listings and application counts.</p>
            </div>
            <a href="{{ route('employer.jobs.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Job Title</th>
                        <th>Posted</th>
                        <th>Applications</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td class="fw-semibold">{{ $job->title }}</td>
                            <td>{{ optional($job->created_at)->format('M d, Y') }}</td>
                            <td><span class="badge badge-primary">{{ $job->applications_count }}</span></td>
                            <td>
                                <span class="badge {{ $job->status ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $job->status ? 'Active' : 'Closed' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('employer.jobs.edit', $job) }}" class="btn btn-sm btn-outline-dark me-1">Edit</a>
                                <a href="{{ route('employer.jobs.index') }}?{{ $job->status ? 'close=' . $job->id : 'reopen=' . $job->id }}" class="btn btn-sm {{ $job->status ? 'btn-outline-danger' : 'btn-outline-secondary' }}">
                                    {{ $job->status ? 'Close' : 'Reopen' }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No jobs posted yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dashboard-section mb-4">
        <div class="section-header d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Recent Applications</h4>
                <p class="text-muted mb-0">Latest candidate submissions for your jobs.</p>
            </div>
            <a href="{{ route('employer.applicants') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>

        @if($recentApplications->isEmpty())
            <div class="empty-state p-5 text-center">
                <h5 class="mb-2">No recent applications yet</h5>
                <p class="text-muted mb-0">Applicants will appear here once candidates apply to your jobs.</p>
            </div>
        @else
            <div class="applications-summary">
                @foreach($recentApplications as $application)
                    <div class="app-item">
                        <div class="app-avatar">{{ strtoupper(substr($application->user->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $application->user->name)[1] ?? '', 0, 1)) }}</div>
                        <div class="app-content">
                            <h6 class="mb-1">{{ $application->user->name }}</h6>
                            <p class="mb-1">Applied for <strong>{{ $application->job->title ?? 'Unknown Role' }}</strong></p>
                            <small class="text-muted">{{ optional($application->created_at)->diffForHumans() }}</small>
                        </div>
                        <a href="{{ route('employer.applicants') }}" class="btn btn-sm btn-primary">Review</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="dashboard-section">
        <div class="section-header mb-3">
            <h4 class="mb-0">Quick Actions</h4>
        </div>

        <div class="actions-grid">
            <a href="{{ route('employer.jobs.create') }}" class="action-card">
                <i class="fas fa-plus"></i>
                <h6>Post New Job</h6>
                <p>Create a new job listing.</p>
            </a>

            <a href="{{ $company ? route('employer.company.edit') : route('employer.company.create') }}" class="action-card">
                <i class="fas fa-edit"></i>
                <h6>{{ $company ? 'Update Profile' : 'Create Company' }}</h6>
                <p>{{ $company ? 'Edit your company details.' : 'Add your employer profile.' }}</p>
            </a>

            <a href="{{ route('employer.applicants') }}" class="action-card">
                <i class="fas fa-inbox"></i>
                <h6>Review Applications</h6>
                <p>Manage candidate submissions.</p>
            </a>

            <a href="{{ route('jobs.list') }}" class="action-card">
                <i class="fas fa-search"></i>
                <h6>Browse Jobs</h6>
                <p>See job market trends and listings.</p>
            </a>
        </div>
    </div>
</div>

<style>
.dashboard-main { padding-bottom: 1rem; }
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.stat-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    min-height: 150px;
}

.stat-card-icon {
    width: 54px;
    height: 54px;
    border-radius: 16px;
    display: grid;
    place-items: center;
    color: #ffffff;
    font-size: 1.25rem;
}

.stat-icon-blue { background: #2563eb; }
.stat-icon-green { background: #16a34a; }
.stat-icon-gold { background: #d97706; }
.stat-icon-purple { background: #7c3aed; }

.dashboard-section {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 1.5rem;
}

.section-header h4 { margin-bottom: 0.25rem; }

.table-responsive { overflow-x: auto; }
.table-borderless td, .table-borderless th { border: none; }
.thead-light th { background: #f8f9fa; }

.badge-primary { background: #dbeafe; color: #0369a1; }
.badge-success { background: #dcfce7; color: #166534; }
.badge-secondary { background: #f3f4f6; color: #4b5563; }

.applications-summary { display: grid; gap: 1rem; }
.app-item {
    display: grid;
    grid-template-columns: 54px 1fr auto;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 12px;
}

.app-avatar {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    color: #ffffff;
    font-weight: 700;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
}

.empty-state { background: #f8f9fa; border-radius: 12px; }

.actions-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
}

.action-card {
    border-radius: 16px;
    border: 1px solid #dbeafe;
    background: #f8fafc;
    padding: 1.4rem;
    text-decoration: none;
    color: inherit;
    transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
}

.action-card:hover {
    transform: translateY(-3px);
    border-color: #93c5fd;
    box-shadow: 0 12px 28px rgba(37, 99, 235, 0.12);
}

.action-card i { font-size: 1.5rem; color: #2563eb; margin-bottom: 0.75rem; }

@media (max-width: 1199px) {
    .stats-grid, .actions-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 767px) {
    .stats-grid, .actions-grid, .applications-summary { grid-template-columns: 1fr; }
    .app-item { grid-template-columns: 1fr; text-align: left; }
    .app-item .btn { justify-self: start; }
}
</style>
@endsection