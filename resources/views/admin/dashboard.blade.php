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
                <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.users') }}" class="menu-item">
                    <i class="fas fa-users"></i> Users
                </a>
                <a href="{{ route('admin.jobs') }}" class="menu-item">
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
                <h1>Admin Dashboard</h1>
                <p class="text-muted">Platform overview and management</p>
            </div>

            <!-- Key Metrics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #dbeafe;">
                        <i class="fas fa-users" style="color: #0369a1;"></i>
                    </div>
                    <h6>Total Users</h6>
                    <h3>1,245</h3>
                    <p class="text-muted">+32 this week</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #dcfce7;">
                        <i class="fas fa-building" style="color: #166534;"></i>
                    </div>
                    <h6>Companies</h6>
                    <h3>328</h3>
                    <p class="text-muted">+12 this week</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #fef3c7;">
                        <i class="fas fa-briefcase" style="color: #b45309;"></i>
                    </div>
                    <h6>Active Jobs</h6>
                    <h3>4,562</h3>
                    <p class="text-muted">+145 this week</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #f3e8ff;">
                        <i class="fas fa-file-alt" style="color: #6d28d9;"></i>
                    </div>
                    <h6>Applications</h6>
                    <h3>28,456</h3>
                    <p class="text-muted">+2,340 this week</p>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h3>Recent Users</h3>
                    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>

                <div class="users-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Ahmed Khan</strong></td>
                                <td>ahmed@example.com</td>
                                <td><span class="badge badge-info">Candidate</span></td>
                                <td>June 15, 2026</td>
                                <td><span class="status-active">Active</span></td>
                                <td><button class="btn btn-xs btn-outline-dark">Edit</button></td>
                            </tr>
                            <tr>
                                <td><strong>Fatima Ahmed</strong></td>
                                <td>fatima@example.com</td>
                                <td><span class="badge badge-warning">Employer</span></td>
                                <td>June 12, 2026</td>
                                <td><span class="status-active">Active</span></td>
                                <td><button class="btn btn-xs btn-outline-dark">Edit</button></td>
                            </tr>
                            <tr>
                                <td><strong>Mohammad Hassan</strong></td>
                                <td>hassan@example.com</td>
                                <td><span class="badge badge-info">Candidate</span></td>
                                <td>June 10, 2026</td>
                                <td><span class="status-active">Active</span></td>
                                <td><button class="btn btn-xs btn-outline-dark">Edit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- System Health -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h3>System Health</h3>
                </div>

                <div class="health-grid">
                    <div class="health-item">
                        <h6>Database</h6>
                        <div class="health-bar">
                            <div class="health-fill" style="width: 75%;"></div>
                        </div>
                        <small>75% utilized</small>
                    </div>

                    <div class="health-item">
                        <h6>Server Load</h6>
                        <div class="health-bar">
                            <div class="health-fill" style="width: 45%;"></div>
                        </div>
                        <small>45% utilized</small>
                    </div>

                    <div class="health-item">
                        <h6>Disk Space</h6>
                        <div class="health-bar">
                            <div class="health-fill" style="width: 32%;"></div>
                        </div>
                        <small>32% utilized</small>
                    </div>

                    <div class="health-item">
                        <h6>API Response</h6>
                        <div class="health-bar">
                            <div class="health-fill" style="width: 18%;"></div>
                        </div>
                        <small>18ms average</small>
                    </div>
                </div>
            </div>

            <!-- Admin Actions -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h3>Quick Actions</h3>
                </div>

                <div class="actions-grid">
                    <a href="{{ route('admin.users') }}" class="action-card">
                        <i class="fas fa-user-plus"></i>
                        <h6>Manage Users</h6>
                        <p>Create, edit, or remove users</p>
                    </a>

                    <a href="{{ route('admin.companies') }}" class="action-card">
                        <i class="fas fa-check-circle"></i>
                        <h6>Verify Companies</h6>
                        <p>Review company registrations</p>
                    </a>

                    <a href="{{ route('admin.jobs') }}" class="action-card">
                        <i class="fas fa-ban"></i>
                        <h6>Review Jobs</h6>
                        <p>Moderate job postings</p>
                    </a>

                    <a href="{{ route('admin.applications') }}" class="action-card">
                        <i class="fas fa-search"></i>
                        <h6>Monitor Applications</h6>
                        <p>Track application metrics</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.badge-info {
    background: #dbeafe;
    color: #0369a1;
}

.badge-warning {
    background: #fef3c7;
    color: #b45309;
}

.status-active {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    background: #dcfce7;
    color: #166534;
    text-transform: uppercase;
}

.health-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
}

.health-item {
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.health-item h6 {
    margin: 0 0 0.75rem 0;
    font-size: 14px;
    font-weight: 600;
}

.health-bar {
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.health-fill {
    height: 100%;
    background: linear-gradient(90deg, #2563eb, #1d4ed8);
    border-radius: 4px;
    transition: width 0.3s ease;
}

.health-item small {
    color: #94a3b8;
}

@media (max-width: 1199px) {
    .health-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 991px) {
    .health-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
