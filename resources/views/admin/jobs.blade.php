@extends('layouts.public')

@section('content')
<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <div class="dashboard-sidebar">
            <div class="profile-card-mini">
                <div class="profile-avatar">AD</div>
                <h6 class="mt-3">Administrator</h6>
                <p class="text-muted small">Admin</p>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="menu-item">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.users') }}" class="menu-item">
                    <i class="fas fa-users"></i> Users
                </a>
                <a href="{{ route('admin.jobs') }}" class="menu-item active">
                    <i class="fas fa-briefcase"></i> Jobs
                </a>
                <a href="{{ route('admin.applications') }}" class="menu-item">
                    <i class="fas fa-file-alt"></i> Applications
                </a>
                <a href="{{ route('admin.companies') }}" class="menu-item">
                    <i class="fas fa-building"></i> Companies
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Job Management</h1>
                <p class="text-muted">Moderate and manage all job postings</p>
            </div>

            <div class="management-actions">
                <div>
                    <input type="text" class="search-input" placeholder="Search jobs...">
                </div>
                <select class="filter-select">
                    <option>All Statuses</option>
                    <option>Active</option>
                    <option>Closed</option>
                    <option>Pending Review</option>
                </select>
            </div>

            <div class="jobs-management-table">
                <table>
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Posted</th>
                            <th>Applications</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Senior Laravel Developer</strong></td>
                            <td>Systems Ltd</td>
                            <td>June 14, 2026</td>
                            <td><span class="badge badge-primary">28</span></td>
                            <td><span class="status-active">Active</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                                <button class="btn btn-xs btn-outline-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>DevOps Engineer</strong></td>
                            <td>10Pearls</td>
                            <td>June 12, 2026</td>
                            <td><span class="badge badge-primary">15</span></td>
                            <td><span class="status-active">Active</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                                <button class="btn btn-xs btn-outline-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>AI/ML Engineer</strong></td>
                            <td>Google</td>
                            <td>June 10, 2026</td>
                            <td><span class="badge badge-primary">42</span></td>
                            <td><span class="status-pending">Pending Review</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-success">Approve</button>
                                <button class="btn btn-xs btn-outline-danger">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Frontend Developer</strong></td>
                            <td>Arbisoft</td>
                            <td>June 08, 2026</td>
                            <td><span class="badge badge-primary">18</span></td>
                            <td><span class="status-inactive">Closed</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>QA Engineer</strong></td>
                            <td>TechWave</td>
                            <td>June 05, 2026</td>
                            <td><span class="badge badge-primary">22</span></td>
                            <td><span class="status-active">Active</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                                <button class="btn btn-xs btn-outline-danger">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.filter-select {
    padding: 0.75rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: white;
    cursor: pointer;
}

.jobs-management-table {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    overflow-x: auto;
}

.jobs-management-table table {
    width: 100%;
    border-collapse: collapse;
}

.jobs-management-table thead {
    background: #f8f9fa;
}

.jobs-management-table th {
    padding: 1rem;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    border-bottom: 1px solid #e5e7eb;
}

.jobs-management-table td {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.status-pending {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    background: #fef3c7;
    color: #b45309;
    text-transform: uppercase;
}
</style>
@endsection
