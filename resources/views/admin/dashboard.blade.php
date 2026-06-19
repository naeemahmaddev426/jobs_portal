@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h1 class="h3 mb-1">Admin Dashboard</h1>
                <p class="text-muted mb-0">Platform overview, metrics, and management tools.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.users') }}" class="btn btn-outline-primary btn-sm">Users</a>
                <a href="{{ route('admin.jobs') }}" class="btn btn-outline-secondary btn-sm">Jobs</a>
                <a href="{{ route('admin.companies') }}" class="btn btn-outline-secondary btn-sm">Companies</a>
                <a href="{{ route('admin.applications') }}" class="btn btn-outline-secondary btn-sm">Applications</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-lg-3 col-sm-6">
        <div class="admin-card shadow-sm p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <span class="text-uppercase text-secondary small">Total Users</span>
                    <h2 class="mt-2 mb-0">{{ $stats['users'] }}</h2>
                </div>
                <div class="admin-icon admin-icon-blue"><i class="fas fa-users"></i></div>
            </div>
            <p class="text-muted mb-0">Registered members across the platform.</p>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="admin-card shadow-sm p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <span class="text-uppercase text-secondary small">Companies</span>
                    <h2 class="mt-2 mb-0">{{ $stats['companies'] }}</h2>
                </div>
                <div class="admin-icon admin-icon-green"><i class="fas fa-building"></i></div>
            </div>
            <p class="text-muted mb-0">Verified employer companies on the platform.</p>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="admin-card shadow-sm p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <span class="text-uppercase text-secondary small">Active Jobs</span>
                    <h2 class="mt-2 mb-0">{{ $stats['jobs'] }}</h2>
                </div>
                <div class="admin-icon admin-icon-gold"><i class="fas fa-briefcase"></i></div>
            </div>
            <p class="text-muted mb-0">Live job postings currently visible to candidates.</p>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="admin-card shadow-sm p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <span class="text-uppercase text-secondary small">Applications</span>
                    <h2 class="mt-2 mb-0">{{ $stats['applications'] }}</h2>
                </div>
                <div class="admin-icon admin-icon-purple"><i class="fas fa-file-alt"></i></div>
            </div>
            <p class="text-muted mb-0">Total submitted job applications.</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-7">
        <div class="admin-card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="mb-1">Recent Users</h5>
                    <p class="text-muted mb-0">Latest registered accounts on the system.</p>
                </div>
                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge {{ $user->role === 'candidate' ? 'badge-info' : ($user->role === 'employer' ? 'badge-warning' : 'badge-danger') }}">{{ ucfirst($user->role) }}</span></td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td><a href="#" class="btn btn-sm btn-outline-secondary">View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No users yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="admin-card shadow-sm p-4 mb-4">
            <div class="mb-3">
                <h5 class="mb-1">System Health</h5>
                <p class="text-muted mb-0">Quick server and system usage overview.</p>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2"><span>Database</span><strong>75%</strong></div>
                <div class="progress rounded-pill" style="height: 10px;"><div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 75%"></div></div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2"><span>Server Load</span><strong>45%</strong></div>
                <div class="progress rounded-pill" style="height: 10px;"><div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: 45%"></div></div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2"><span>Disk Space</span><strong>32%</strong></div>
                <div class="progress rounded-pill" style="height: 10px;"><div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 32%"></div></div>
            </div>
            <div>
                <div class="d-flex justify-content-between mb-2"><span>API Response</span><strong>18ms</strong></div>
                <div class="progress rounded-pill" style="height: 10px;"><div class="progress-bar bg-info rounded-pill" role="progressbar" style="width: 18%"></div></div>
            </div>
        </div>

        <div class="admin-card shadow-sm p-4">
            <div class="mb-3">
                <h5 class="mb-1">Quick Actions</h5>
                <p class="text-muted mb-0">Jump to common admin workflows.</p>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action px-0 py-3"> <i class="fas fa-user-cog me-2 text-primary"></i> Manage Users</a>
                <a href="{{ route('admin.companies') }}" class="list-group-item list-group-item-action px-0 py-3"> <i class="fas fa-building me-2 text-success"></i> Verify Companies</a>
                <a href="{{ route('admin.jobs') }}" class="list-group-item list-group-item-action px-0 py-3"> <i class="fas fa-briefcase me-2 text-warning"></i> Review Jobs</a>
                <a href="{{ route('admin.applications') }}" class="list-group-item list-group-item-action px-0 py-3"> <i class="fas fa-file-alt me-2 text-info"></i> Monitor Applications</a>
            </div>
        </div>
    </div>
</div>

<style>
.admin-card { background: #ffffff; border-radius: 16px; border: 1px solid #e5e7eb; }
.admin-icon { width: 44px; height: 44px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; color: white; }
.admin-icon-blue { background: #2563eb; }
.admin-icon-green { background: #16a34a; }
.admin-icon-gold { background: #d97706; }
.admin-icon-purple { background: #7c3aed; }
.badge-info { background: #dbeafe; color: #0369a1; }
.badge-warning { background: #fef3c7; color: #b45309; }
.badge-danger { background: #fee2e2; color: #991b1b; }
@media (max-width: 991px) {
    .admin-card { border-radius: 14px; }
}
</style>
@endsection
