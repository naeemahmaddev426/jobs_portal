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
                <a href="{{ route('employer.dashboard') }}" class="menu-item active">
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
                <a href="{{ route('employer.applicants') }}" class="menu-item">
                    <i class="fas fa-users"></i> View Applicants
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Employer Dashboard</h1>
                <p class="text-muted">Manage your job postings and applicants</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #dbeafe;">
                        <i class="fas fa-briefcase" style="color: #0369a1;"></i>
                    </div>
                    <h6>Active Jobs</h6>
                    <h3>12</h3>
                    <p class="text-muted">Posted recently</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #dcfce7;">
                        <i class="fas fa-file-alt" style="color: #166534;"></i>
                    </div>
                    <h6>Total Applications</h6>
                    <h3>156</h3>
                    <p class="text-muted">From all jobs</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #fef3c7;">
                        <i class="fas fa-star" style="color: #b45309;"></i>
                    </div>
                    <h6>Shortlisted</h6>
                    <h3>28</h3>
                    <p class="text-muted">Pending review</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #c7d2fe;">
                        <i class="fas fa-check" style="color: #3730a3;"></i>
                    </div>
                    <h6>Hired</h6>
                    <h3>5</h3>
                    <p class="text-muted">This month</p>
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
                            <tr>
                                <td><strong>Senior Laravel Developer</strong></td>
                                <td>June 14, 2026</td>
                                <td><span class="badge badge-primary">28</span></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-xs btn-outline-dark">Edit</button>
                                    <button class="btn btn-xs btn-outline-danger">Close</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>DevOps Engineer</strong></td>
                                <td>June 12, 2026</td>
                                <td><span class="badge badge-primary">15</span></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-xs btn-outline-dark">Edit</button>
                                    <button class="btn btn-xs btn-outline-danger">Close</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>QA Engineer</strong></td>
                                <td>June 10, 2026</td>
                                <td><span class="badge badge-primary">32</span></td>
                                <td><span class="badge badge-secondary">Closed</span></td>
                                <td>
                                    <button class="btn btn-xs btn-outline-dark">Reopen</button>
                                </td>
                            </tr>
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
                    <div class="app-item">
                        <div class="app-avatar">AK</div>
                        <div class="app-content">
                            <h6>Ahmed Khan</h6>
                            <p>Applied for <strong>Senior Laravel Developer</strong></p>
                            <small class="text-muted">5 minutes ago</small>
                        </div>
                        <button class="btn btn-sm btn-primary">Review</button>
                    </div>

                    <div class="app-item">
                        <div class="app-avatar">FA</div>
                        <div class="app-content">
                            <h6>Fatima Ahmed</h6>
                            <p>Applied for <strong>DevOps Engineer</strong></p>
                            <small class="text-muted">1 hour ago</small>
                        </div>
                        <button class="btn btn-sm btn-primary">Review</button>
                    </div>

                    <div class="app-item">
                        <div class="app-avatar">MH</div>
                        <div class="app-content">
                            <h6>Mohammad Hassan</h6>
                            <p>Applied for <strong>Senior Laravel Developer</strong></p>
                            <small class="text-muted">3 hours ago</small>
                        </div>
                        <button class="btn btn-sm btn-primary">Review</button>
                    </div>
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

                    <a href="{{ route('employer.company.edit') }}" class="action-card">
                        <i class="fas fa-edit"></i>
                        <h6>Update Profile</h6>
                        <p>Edit company information</p>
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
