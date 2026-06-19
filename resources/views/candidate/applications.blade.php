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
                <a href="{{ route('candidate.applications') }}" class="menu-item active">
                    <i class="fas fa-file-alt"></i> My Applications
                </a>
                <a href="{{ route('candidate.saved-jobs') }}" class="menu-item">
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
                <h1>My Applications</h1>
                <p class="text-muted">Track all your job applications</p>
            </div>

            <div class="applications-filters">
                <select class="filter-select">
                    <option>All Applications</option>
                    <option>Applied</option>
                    <option>Pending</option>
                    <option>Rejected</option>
                    <option>Accepted</option>
                </select>
            </div>

            <div class="applications-list">
                @forelse($applications as $application)
                    <div class="application-card">
                        <div class="app-company-logo">{{ strtoupper(substr($application->job->title ?? 'Job', 0, 2)) }}</div>
                        <div class="app-info">
                            <h5>{{ $application->job->title ?? 'Job title unavailable' }}</h5>
                            <p class="app-company">{{ $application->job->company->company_name ?? 'Company name unavailable' }}</p>
                            <p class="app-meta">Applied on {{ $application->created_at->format('F j, Y') }}</p>
                        </div>
                        <div class="app-status">
                            @php
                                $statusClass = match($application->status) {
                                    'pending' => 'status-pending',
                                    'rejected' => 'status-rejected',
                                    'accepted' => 'status-accepted',
                                    default => 'status-pending',
                                };
                                $statusLabel = match($application->status) {
                                    'pending' => 'Pending',
                                    'rejected' => 'Rejected',
                                    'accepted' => 'Accepted',
                                    default => 'Pending',
                                };
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                        </div>
                        <div class="app-actions">
                            <a href="{{ route('jobs.show', $application->job->slug ?? '#') }}" class="btn btn-sm btn-outline-dark">View Details</a>
                            @if($application->status === 'pending')
                                <button class="btn btn-sm btn-outline-danger">Withdraw</button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-briefcase"></i>
                        <h4>No applications yet</h4>
                        <p>Start applying to jobs to see them here</p>
                        <a href="{{ route('jobs.list') }}" class="btn btn-primary mt-3">Browse Jobs</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
.applications-filters {
    margin-bottom: 2rem;
    display: flex;
    gap: 1rem;
}

.filter-select {
    padding: 0.5rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: white;
    cursor: pointer;
}

.applications-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.application-card {
    display: grid;
    grid-template-columns: 60px 1fr auto auto;
    gap: 1.5rem;
    align-items: center;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 12px;
    border-left: 4px solid #2563eb;
    transition: all 0.25s ease;
}

.application-card:hover {
    background: #f1f5f9;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12);
}

.app-company-logo {
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

.app-info h5 {
    margin: 0 0 0.5rem 0;
    font-size: 16px;
    color: #0f172a;
}

.app-company {
    margin: 0 0 0.5rem 0;
    font-size: 14px;
    color: #64748b;
    font-weight: 500;
}

.app-meta {
    margin: 0;
    font-size: 12px;
    color: #94a3b8;
}

.app-status {
    text-align: center;
}

.status-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-applied {
    background: #dbeafe;
    color: #0369a1;
}

.status-pending {
    background: #fff7ed;
    color: #92400e;
}

.status-shortlisted {
    background: #dcfce7;
    color: #166534;
}

.status-rejected {
    background: #fee2e2;
    color: #991b1b;
}

.status-accepted {
    background: #c7d2fe;
    color: #3730a3;
}

.app-actions {
    display: flex;
    gap: 0.5rem;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: #f8f9fa;
    border-radius: 12px;
}

.empty-state i {
    font-size: 48px;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.empty-state h4 {
    color: #475569;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #94a3b8;
}

@media (max-width: 991px) {
    .application-card {
        grid-template-columns: 50px 1fr;
        gap: 1rem;
    }

    .app-status,
    .app-actions {
        grid-column: 1 / -1;
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }
}
</style>
@endsection
