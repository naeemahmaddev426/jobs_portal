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
                <a href="{{ route('admin.users') }}" class="menu-item active">
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
                <h1>User Management</h1>
                <p class="text-muted">Manage all system users</p>
            </div>

            <div class="management-actions">
                <div>
                    <input type="text" class="search-input" placeholder="Search users...">
                </div>
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus"></i> Add New User
                </button>
            </div>

            <div class="users-management-table">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined Date</th>
                            <th>Status</th>
                            <th>Verified</th>
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
                            <td><i class="fas fa-check" style="color: #16a34a;"></i></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">Edit</button>
                                <button class="btn btn-xs btn-outline-danger">Block</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Fatima Ahmed</strong></td>
                            <td>fatima@example.com</td>
                            <td><span class="badge badge-warning">Employer</span></td>
                            <td>June 12, 2026</td>
                            <td><span class="status-active">Active</span></td>
                            <td><i class="fas fa-check" style="color: #16a34a;"></i></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">Edit</button>
                                <button class="btn btn-xs btn-outline-danger">Block</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Mohammad Hassan</strong></td>
                            <td>hassan@example.com</td>
                            <td><span class="badge badge-info">Candidate</span></td>
                            <td>June 10, 2026</td>
                            <td><span class="status-active">Active</span></td>
                            <td><i class="fas fa-check" style="color: #16a34a;"></i></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">Edit</button>
                                <button class="btn btn-xs btn-outline-danger">Block</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Saira Ali</strong></td>
                            <td>saira@example.com</td>
                            <td><span class="badge badge-info">Candidate</span></td>
                            <td>June 08, 2026</td>
                            <td><span class="status-inactive">Inactive</span></td>
                            <td><i class="fas fa-times" style="color: #dc2626;"></i></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">Edit</button>
                                <button class="btn btn-xs btn-outline-success">Activate</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Usman Malik</strong></td>
                            <td>usman@example.com</td>
                            <td><span class="badge badge-warning">Employer</span></td>
                            <td>June 05, 2026</td>
                            <td><span class="status-blocked">Blocked</span></td>
                            <td><i class="fas fa-times" style="color: #dc2626;"></i></td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">Edit</button>
                                <button class="btn btn-xs btn-outline-success">Unblock</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.management-actions {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
    align-items: center;
}

.management-actions > div {
    flex: 1;
}

.search-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
}

.search-input:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.users-management-table {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    overflow-x: auto;
}

.users-management-table table {
    width: 100%;
    border-collapse: collapse;
}

.users-management-table thead {
    background: #f8f9fa;
}

.users-management-table th {
    padding: 1rem;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    border-bottom: 1px solid #e5e7eb;
}

.users-management-table td {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.status-inactive {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    background: #fef3c7;
    color: #b45309;
    text-transform: uppercase;
}

.status-blocked {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    background: #fee2e2;
    color: #991b1b;
    text-transform: uppercase;
}
</style>
@endsection
