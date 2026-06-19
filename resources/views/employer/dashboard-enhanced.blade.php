@extends('layouts.employer')

@section('content')
<div class="mb-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
        <div>
            <h1 class="h3 mb-1">Employer Dashboard</h1>
            <p class="text-muted mb-0">Manage your job postings and applicants in one place.</p>
        </div>
        <div>
            <span class="badge bg-primary py-2 px-3 text-uppercase fs-6">{{ $company ? $company->name : 'No Company Created' }}</span>
        </div>
    </div>
</div>

<div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #dbeafe;">
                        <i class="fas fa-briefcase" style="color: #0369a1;"></i>
                    </div>
                    <h6>Active Jobs</h6>
                    <h3>{{ $jobs->count() }}</h3>
                    <p class="text-muted">Open listings from your company.</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #dcfce7;">
                        <i class="fas fa-file-alt" style="color: #166534;"></i>
                    </div>
                    <h6>Total Applications</h6>
                    <h3>{{ $applications->count() }}</h3>
                    <p class="text-muted">Submitted across all your jobs.</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #fef3c7;">
                        <i class="fas fa-star" style="color: #b45309;"></i>
                    </div>
                    <h6>Shortlisted</h6>
                    <h3>{{ $applications->where('status', 'shortlisted')->count() }}</h3>
                    <p class="text-muted">Candidates marked for review.</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #c7d2fe;">
                        <i class="fas fa-check" style="color: #3730a3;"></i>
                    </div>
                    <h6>Hired</h6>
                    <h3>{{ $applications->where('status', 'hired')->count() }}</h3>
                    <p class="text-muted">Successful hires from your listings.</p>
                </div>
            </div>

            <!-- Recent Jobs -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h3>Recent Job Postings</h3>
                    <a href="{{ route('employer.jobs.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>

                <div class="jobs-table">
                    <table>
                        <thead>
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
                                    <td><strong>{{ $job->title }}</strong></td>
                                    <td>{{ optional($job->created_at)->format('M d, Y') }}</td>
                                    <td><span class="badge badge-primary">{{ $job->applications_count }}</span></td>
                                    <td>
                                        <span class="badge {{ $job->status ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $job->status ? 'Active' : 'Closed' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('employer.jobs.edit', $job) }}" class="btn btn-xs btn-outline-dark">Edit</a>
                                        @if($job->status)
                                            <a href="{{ route('employer.jobs.index') }}?close={{ $job->id }}" class="btn btn-xs btn-outline-danger">Close</a>
                                        @else
                                            <a href="{{ route('employer.jobs.index') }}?reopen={{ $job->id }}" class="btn btn-xs btn-outline-dark">Reopen</a>
                                        @endif
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

            <!-- Recent Applications -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h3>Recent Applications</h3>
                    <a href="{{ route('employer.applicants') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>

                <div class="applications-summary">
                    @forelse($recentApplications as $application)
                        <div class="app-item">
                            <div class="app-avatar">{{ strtoupper(substr($application->user->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $application->user->name)[1] ?? '', 0, 1)) }}</div>
                            <div class="app-content">
                                <h6>{{ $application->user->name }}</h6>
                                <p>Applied for <strong>{{ $application->job->title ?? '—' }}</strong></p>
                                <small class="text-muted">{{ optional($application->created_at)->diffForHumans() }}</small>
                            </div>
                            <a href="{{ route('employer.applicants') }}" class="btn btn-sm btn-primary">Review</a>
                        </div>
                    @empty
                        <div class="app-item justify-content-center text-center py-5">
                            <div class="app-content">
                                <h6 class="mb-2">No recent applications yet</h6>
                                <p class="text-muted mb-0">Applicants will appear here once candidates apply to your jobs.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h3>Quick Actions</h3>
                </div>

                <div class="actions-grid">
                    <a href="{{ route('employer.jobs.create') }}" class="action-card">
                        <i class="fas fa-plus"></i>
                        <h6>Post New Job</h6>
                        <p>Create a new job listing</p>
                    </a>

                    <a href="{{ $company ? route('employer.company.edit') : route('employer.company.create') }}" class="action-card">
                        <i class="fas fa-edit"></i>
                        <h6>{{ $company ? 'Update Profile' : 'Create Company' }}</h6>
                        <p>{{ $company ? 'Edit company information' : 'Add your employer profile' }}</p>
                    </a>

                    <a href="{{ route('employer.applicants') }}" class="action-card">
                        <i class="fas fa-inbox"></i>
                        <h6>Review Applications</h6>
                        <p>Check new applications</p>
                    </a>

                    <a href="{{ route('jobs.list') }}" class="action-card">
                        <i class="fas fa-search"></i>
                        <h6>Browse Jobs</h6>
                        <p>See job market trends</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    transition: all 0.25s ease;
}

.stat-card:hover {
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 1rem;
}

.stat-card h6 {
    font-size: 12px;
    text-transform: uppercase;
    color: #64748b;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
}

.stat-card h3 {
    margin: 0 0 0.5rem 0;
    font-size: 28px;
    font-weight: 700;
    color: #0f172a;
}

.dashboard-section {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    margin-bottom: 1.5rem;
}

.jobs-table {
    overflow-x: auto;
}

.jobs-table table {
    width: 100%;
    border-collapse: collapse;
}

.jobs-table thead {
    background: #f8f9fa;
}

.jobs-table th {
    padding: 1rem;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    border-bottom: 1px solid #e5e7eb;
}

.jobs-table td {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.badge {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.badge-primary {
    background: #dbeafe;
    color: #0369a1;
}

.badge-success {
    background: #dcfce7;
    color: #166534;
}

.badge-secondary {
    background: #f3f4f6;
    color: #4b5563;
}

.btn-xs {
    padding: 0.35rem 0.75rem;
    font-size: 11px;
}

.applications-summary {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.app-item {
    display: grid;
    grid-template-columns: 45px 1fr auto;
    gap: 1rem;
    align-items: center;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.app-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
}

.app-content h6 {
    margin: 0 0 0.25rem 0;
}

.app-content p {
    margin: 0.25rem 0;
    font-size: 14px;
    color: #64748b;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.action-card {
    padding: 1.5rem;
    background: linear-gradient(135deg, #f0f9ff, #f8fafc);
    border: 1px solid #dbeafe;
    border-radius: 12px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: all 0.25s ease;
}

.action-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(37, 99, 235, 0.15);
    border-color: #2563eb;
}

.action-card i {
    font-size: 32px;
    color: #2563eb;
    margin-bottom: 1rem;
}

.action-card h6 {
    margin: 0 0 0.5rem 0;
    font-size: 16px;
    font-weight: 600;
}

.action-card p {
    margin: 0;
    font-size: 13px;
    color: #64748b;
}

@media (max-width: 1199px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .actions-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 991px) {
    .dashboard-container {
        grid-template-columns: 1fr;
    }

    .dashboard-sidebar {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 2rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .actions-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
