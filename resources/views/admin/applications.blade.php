@extends('layouts.admin')

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
                <a href="{{ route('admin.jobs') }}" class="menu-item">
                    <i class="fas fa-briefcase"></i> Jobs
                </a>
                <a href="{{ route('admin.applications') }}" class="menu-item active">
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
                <h1>Application Management</h1>
                <p class="text-muted">Monitor and analyze job applications</p>
            </div>

            <div class="management-actions">
                <div>
                    <input type="text" class="search-input" placeholder="Search applications...">
                </div>
                <select class="filter-select">
                    <option>All Statuses</option>
                    <option>Applied</option>
                    <option>Shortlisted</option>
                    <option>Rejected</option>
                </select>
            </div>

            <!-- Stats -->
            <div class="stats-mini-grid">
                <div class="stat-mini">
                    <h6>Total Applications</h6>
                    <h3>{{ \App\Models\JobApplication::count() }}</h3>
                </div>
                <div class="stat-mini">
                    <h6>Applied (This Week)</h6>
                    <h3>{{ \App\Models\JobApplication::whereBetween('created_at',[now()->subWeek(), now()])->count() }}</h3>
                </div>
                <div class="stat-mini">
                    <h6>Pending</h6>
                    <h3>{{ \App\Models\JobApplication::where('status','pending')->count() }}</h3>
                </div>
                <div class="stat-mini">
                    <h6>Rejected</h6>
                    <h3>{{ \App\Models\JobApplication::where('status','rejected')->count() }}</h3>
                </div>
            </div>

            <div class="applications-management-table">
                <table>
                    <thead>
                        <tr>
                            <th>Candidate</th>
                            <th>Job</th>
                            <th>Company</th>
                            <th>Applied</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Ahmed Khan</strong></td>
                            <td>Senior Laravel Developer</td>
                            <td>Systems Ltd</td>
                            <td>2 hours ago</td>
                            <td><span class="badge badge-primary">Applied</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Fatima Ahmed</strong></td>
                            <td>DevOps Engineer</td>
                            <td>10Pearls</td>
                            <td>5 hours ago</td>
                            <td><span class="badge badge-success">Shortlisted</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Mohammad Hassan</strong></td>
                            <td>Senior Laravel Developer</td>
                            <td>Systems Ltd</td>
                            <td>1 day ago</td>
                            <td><span class="badge badge-danger">Rejected</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Saira Ali</strong></td>
                            <td>AI/ML Engineer</td>
                            <td>Google</td>
                            <td>3 days ago</td>
                            <td><span class="badge badge-success">Shortlisted</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Usman Malik</strong></td>
                            <td>QA Engineer</td>
                            <td>TechWave</td>
                            <td>1 week ago</td>
                            <td><span class="badge badge-danger">Rejected</span></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.stats-mini-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-mini {
    background: white;
    padding: 1rem;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.stat-mini h6 {
    font-size: 12px;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 0.5rem;
}

.stat-mini h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
    color: #2563eb;
}

.badge-success {
    background: #dcfce7;
    color: #166534;
}

.badge-danger {
    background: #fee2e2;
    color: #991b1b;
}

.applications-management-table {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    overflow-x: auto;
}

.applications-management-table table {
    width: 100%;
    border-collapse: collapse;
}

.applications-management-table thead {
    background: #f8f9fa;
}

.applications-management-table th {
    padding: 1rem;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    border-bottom: 1px solid #e5e7eb;
}

.applications-management-table td {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

@media (max-width: 1199px) {
    .stats-mini-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 991px) {
    .stats-mini-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
