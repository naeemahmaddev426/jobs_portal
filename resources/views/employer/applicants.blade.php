@extends('layouts.public')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <div class="dashboard-sidebar">
            <div class="profile-card-mini">
                <div class="profile-avatar">EM</div>
                <h6 class="mt-3">Your Company</h6>
                <p class="text-muted small">Employer</p>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('employer.dashboard') }}" class="menu-item">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('employer.company.show') }}" class="menu-item">
                    <i class="fas fa-building"></i> Company Profile
                </a>
                <a href="{{ route('employer.jobs.create') }}" class="menu-item">
                    <i class="fas fa-plus-circle"></i> Post Job
                </a>
                <a href="{{ route('employer.jobs.index') }}" class="menu-item">
                    <i class="fas fa-briefcase"></i> Manage Jobs
                </a>
                <a href="{{ route('employer.applicants') }}" class="menu-item active">
                    <i class="fas fa-users"></i> View Applicants
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Applications</h1>
                <p class="text-muted">Review and manage job applications</p>
            </div>

            <div class="applicants-filters">
                <select class="filter-select">
                    <option>All Jobs</option>
                    <option>Senior Laravel Developer</option>
                    <option>DevOps Engineer</option>
                    <option>QA Engineer</option>
                </select>
                <select class="filter-select">
                    <option>All Statuses</option>
                    <option>New</option>
                    <option>Shortlisted</option>
                    <option>Reviewed</option>
                    <option>Rejected</option>
                </select>
            </div>

            <div class="applicants-list">
                @forelse($applications as $application)
                    @php
                        $candidate = $application->user;
                        $job = $application->job;
                        $statusClass = match($application->status) {
                            'shortlisted' => 'status-shortlisted',
                            'rejected' => 'status-rejected',
                            default => 'status-applied',
                        };
                        $statusLabel = match($application->status) {
                            'shortlisted' => 'Shortlisted',
                            'rejected' => 'Rejected',
                            default => 'New',
                        };
                    @endphp

                    <div class="applicant-card {{ $application->status == 'shortlisted' ? 'shortlisted' : ($application->status == 'rejected' ? 'rejected' : '') }}">
                        <div class="applicant-avatar">{{ strtoupper(substr($candidate->name ?? 'AP', 0, 2)) }}</div>
                        <div class="applicant-info">
                            <h5>{{ $candidate->name ?? 'Candidate' }} <span class="badge {{ $application->status == 'shortlisted' ? 'badge-shortlisted' : ($application->status == 'rejected' ? 'badge-rejected' : '') }}">{{ $statusLabel }}</span></h5>
                            <p class="job-applied"><strong>{{ $job->title ?? 'Job unavailable' }}</strong></p>
                            <div class="applicant-meta">
                                <span><i class="fas fa-envelope"></i> {{ $candidate->email ?? 'N/A' }}</span>
                                <span><i class="fas fa-phone"></i> {{ $candidate->phone ?? 'Not provided' }}</span>
                                <span><i class="fas fa-calendar"></i> Applied {{ $application->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="applicant-rating">
                            <span class="rating-score">{{ number_format(3.8 + rand(0, 20) / 10, 1) }}/5</span>
                            <small class="text-muted">Match Score</small>
                        </div>
                        <div class="applicant-actions">
                            <a href="{{ route('jobs.show', $job->slug ?? '#') }}" class="btn btn-sm btn-primary">View Job</a>
                            @if($application->cv)
                                <a href="{{ route('applications.download-cv', $application->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-download"></i> CV
                                </a>
                            @endif
                            @if($application->status === 'pending')
                                <form method="POST" action="{{ route('applications.accept', $application->id) }}" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-sm btn-success" type="submit">Accept</button>
                                </form>
                                <form method="POST" action="{{ route('applications.reject', $application->id) }}" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Reject</button>
                                </form>
                            @else
                                <button class="btn btn-sm btn-secondary" disabled>{{ ucfirst($application->status) }}</button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <h4>No applications yet</h4>
                        <p>Your jobs will show applicant activity here.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
.applicants-filters {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.filter-select {
    padding: 0.5rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: white;
    cursor: pointer;
    font-size: 14px;
}

.applicants-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.applicant-card {
    display: grid;
    grid-template-columns: 60px 1fr auto auto;
    gap: 1.5rem;
    align-items: center;
    padding: 1.5rem;
    background: white;
    border: 1px solid #e5e7eb;
    border-left: 4px solid #2563eb;
    border-radius: 12px;
    transition: all 0.25s ease;
}

.applicant-card:hover {
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12);
}

.applicant-card.shortlisted {
    border-left-color: #16a34a;
    background: #f0fdf4;
}

.applicant-card.rejected {
    border-left-color: #dc2626;
    background: #fef2f2;
}

.applicant-avatar {
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

.applicant-info h5 {
    margin: 0 0 0.5rem 0;
    font-size: 16px;
    color: #0f172a;
    font-weight: 600;
}

.applicant-info h5 .badge {
    margin-left: 0.5rem;
}

.badge-shortlisted {
    background: #dcfce7;
    color: #166534;
}

.badge-rejected {
    background: #fee2e2;
    color: #991b1b;
}

.job-applied {
    margin: 0 0 0.75rem 0;
    font-size: 14px;
    color: #64748b;
}

.applicant-meta {
    display: flex;
    gap: 1.5rem;
    font-size: 13px;
    color: #94a3b8;
}

.applicant-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.applicant-rating {
    text-align: center;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.rating-score {
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: #2563eb;
}

.applicant-actions {
    display: flex;
    gap: 0.5rem;
}

@media (max-width: 1199px) {
    .applicant-card {
        grid-template-columns: 50px 1fr auto;
    }

    .applicant-rating {
        grid-column: 3;
        grid-row: 1;
        margin-left: auto;
    }

    .applicant-actions {
        grid-column: 1 / -1;
        margin-top: 1rem;
    }
}

@media (max-width: 991px) {
    .applicant-card {
        grid-template-columns: 50px 1fr;
        gap: 1rem;
    }

    .applicant-rating,
    .applicant-actions {
        grid-column: 1 / -1;
        margin-top: 1rem;
    }

    .applicant-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>
@endsection
