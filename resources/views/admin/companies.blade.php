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
                <a href="{{ route('admin.applications') }}" class="menu-item">
                    <i class="fas fa-file-alt"></i> Applications
                </a>
                <a href="{{ route('admin.companies') }}" class="menu-item active">
                    <i class="fas fa-building"></i> Companies
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Company Management</h1>
                <p class="text-muted">Verify and manage employer companies</p>
            </div>

            <div class="management-actions">
                <div>
                    <input type="text" class="search-input" placeholder="Search companies...">
                </div>
                <select class="filter-select">
                    <option>All Statuses</option>
                    <option>Verified</option>
                    <option>Pending</option>
                    <option>Rejected</option>
                </select>
            </div>

            <div class="companies-management-table">
                <table>
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                            <th>Jobs Posted</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Systems Ltd</strong></td>
                            <td>Fatima Ahmed</td>
                            <td>info@systems.com</td>
                            <td>12</td>
                            <td><span class="badge badge-success-filled">Verified</span></td>
                            <td>May 20, 2026</td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                                <button class="btn btn-xs btn-outline-danger">Suspend</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>10Pearls</strong></td>
                            <td>Mohammad Hassan</td>
                            <td>hr@10pearls.com</td>
                            <td>8</td>
                            <td><span class="badge badge-success-filled">Verified</span></td>
                            <td>June 01, 2026</td>
                            <td>
                                <button class="btn btn-xs btn-outline-dark">View</button>
                                <button class="btn btn-xs btn-outline-danger">Suspend</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>TechWave</strong></td>
                            <td>Usman Malik</td>
                            <td>hello@techwave.com</td>
                            <td>5</td>
                            <td><span class="badge badge-warning-filled">Pending</span></td>
                            <td>June 10, 2026</td>
                            <td>
                                <button class="btn btn-xs btn-outline-success">Verify</button>
                                <button class="btn btn-xs btn-outline-danger">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Innovation Labs</strong></td>
                            <td>Sarah Khan</td>
                            <td>contact@innovatelabs.com</td>
                            <td>0</td>
                            <td><span class="badge badge-warning-filled">Pending</span></td>
                            <td>June 14, 2026</td>
                            <td>
                                <button class="btn btn-xs btn-outline-success">Verify</button>
                                <button class="btn btn-xs btn-outline-danger">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>DataFlow Solutions</strong></td>
                            <td>Ali Raza</td>
                            <td>admin@dataflow.com</td>
                            <td>3</td>
                            <td><span class="badge badge-danger-filled">Rejected</span></td>
                            <td>June 08, 2026</td>
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
.badge-success-filled {
    background: #16a34a;
    color: white;
}

.badge-warning-filled {
    background: #b45309;
    color: white;
}

.badge-danger-filled {
    background: #dc2626;
    color: white;
}

.companies-management-table {
    background: white;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    overflow-x: auto;
}

.companies-management-table table {
    width: 100%;
    border-collapse: collapse;
}

.companies-management-table thead {
    background: #f8f9fa;
}

.companies-management-table th {
    padding: 1rem;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    border-bottom: 1px solid #e5e7eb;
}

.companies-management-table td {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
}
</style>
@endsection
