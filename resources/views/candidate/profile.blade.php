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
                <a href="{{ route('candidate.profile') }}" class="menu-item active">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <a href="{{ route('candidate.applications') }}" class="menu-item">
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
                <h1>My Profile</h1>
                <p class="text-muted">Update your professional information</p>
            </div>

            @php
                $applications = $applications ?? collect();
                $stats = [
                    'applications' => $applications->count(),
                    'shortlisted' => $applications->where('status', 'shortlisted')->count(),
                    'accepted' => $applications->where('status', 'accepted')->count(),
                    'saved_jobs' => 0,
                ];
            @endphp

            <div class="dashboard-overview">
                <div class="overview-card">
                    <h2>{{ $stats['applications'] }}</h2>
                    <p>Applications</p>
                </div>
                <div class="overview-card">
                    <h2>{{ $stats['shortlisted'] }}</h2>
                    <p>Shortlisted</p>
                </div>
                <div class="overview-card">
                    <h2>{{ $stats['accepted'] }}</h2>
                    <p>Accepted</p>
                </div>
                <div class="overview-card">
                    <h2>{{ $stats['saved_jobs'] }}</h2>
                    <p>Saved Jobs</p>
                </div>
            </div>

            <div class="dashboard-actions mb-4">
                <a href="{{ route('candidate.applications') }}" class="btn btn-outline-primary">View Applications</a>
                <a href="{{ route('candidate.saved-jobs') }}" class="btn btn-outline-secondary">Saved Jobs</a>
                <a href="{{ route('candidate.resume') }}" class="btn btn-outline-secondary">Resume</a>
            </div>

            <div class="profile-section">
                <div class="section-header">
                    <h3>Personal Information</h3>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                </div>

                <div class="profile-grid">
                    <div class="profile-item">
                        <label>Full Name</label>
                        <p>{{ auth()->user()->name }}</p>
                    </div>
                    <div class="profile-item">
                        <label>Email</label>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div class="profile-item">
                        <label>Phone</label>
                        <p class="text-muted">Not provided</p>
                    </div>
                    <div class="profile-item">
                        <label>Location</label>
                        <p class="text-muted">Not provided</p>
                    </div>
                </div>
            </div>

            <div class="profile-section">
                <div class="section-header">
                    <h3>Professional Summary</h3>
                </div>
                <p class="text-muted">No summary added yet. <a href="{{ route('profile.edit') }}">Add one</a></p>
            </div>

            <div class="profile-section">
                <div class="section-header">
                    <h3>Experience</h3>
                </div>
                <p class="text-muted">No experience added yet. <a href="{{ route('profile.edit') }}">Add your experience</a></p>
            </div>

            <div class="profile-section">
                <div class="section-header">
                    <h3>Skills</h3>
                </div>
                <p class="text-muted">No skills added yet. <a href="{{ route('profile.edit') }}">Add your skills</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.dashboard-wrapper {
    background: #f8f9fa;
    min-height: calc(100vh - 80px);
    padding: 2rem 0;
}

.dashboard-container {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 2rem;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
}

.dashboard-sidebar {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    height: fit-content;
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.06);
}

.profile-card-mini {
    text-align: center;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.profile-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
    margin: 0 auto;
}

.sidebar-menu {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 1rem;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    color: #475569;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.25s ease;
    font-size: 14px;
    font-weight: 500;
}

.menu-item:hover {
    background: #f1f5f9;
    color: #2563eb;
}

.menu-item.active {
    background: #2563eb;
    color: white;
}

.dashboard-content {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 2px 8px rgba(15, 23, 42, 0.06);
}

.page-header {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.page-header h1 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.profile-section {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.profile-section:last-child {
    border-bottom: none;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.section-header h3 {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}

.profile-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
}

.profile-item {
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.profile-item label {
    display: block;
    font-size: 12px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
}

.profile-item p {
    font-size: 15px;
    color: #0f172a;
    margin: 0;
}

@media (max-width: 991px) {
    .dashboard-container {
        grid-template-columns: 1fr;
    }

    .dashboard-sidebar {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 2rem;
        align-items: start;
    }

    .profile-card-mini {
        border-bottom: none;
    }

    .sidebar-menu {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .menu-item {
        flex: 1;
        min-width: 120px;
    }

    .profile-grid {
        grid-template-columns: 1fr;
    }
}

.dashboard-overview {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.overview-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
}

.overview-card h2 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.overview-card p {
    margin: 0;
    color: #64748b;
}

.dashboard-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    margin-bottom: 2rem;
}

.dashboard-actions .btn {
    min-width: 160px;
}
</style>
