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
                <a href="{{ route('candidate.applications') }}" class="menu-item">
                    <i class="fas fa-file-alt"></i> My Applications
                </a>
                <a href="{{ route('candidate.saved-jobs') }}" class="menu-item">
                    <i class="fas fa-bookmark"></i> Saved Jobs
                </a>
                <a href="{{ route('candidate.resume') }}" class="menu-item active">
                    <i class="fas fa-file-pdf"></i> Resume
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="page-header">
                <h1>Resume</h1>
                <p class="text-muted">Manage your professional resume</p>
            </div>

            <div class="resume-section">
                <div class="section-header">
                    <h3>Your Resumes</h3>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Upload Resume
                    </button>
                </div>

                <div class="resume-list">
                    <!-- Resume Item 1 -->
                    <div class="resume-card">
                        <div class="resume-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="resume-info">
                            <h5>CV_Ahmed_Khan_2026.pdf</h5>
                            <p class="text-muted small">Uploaded on June 10, 2026 • 245 KB</p>
                        </div>
                        <div class="resume-actions">
                            <button class="btn btn-sm btn-outline-dark" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-dark" title="Preview">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Resume Item 2 -->
                    <div class="resume-card">
                        <div class="resume-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="resume-info">
                            <h5>CV_Ahmed_Khan_2025.pdf</h5>
                            <p class="text-muted small">Uploaded on March 05, 2025 • 198 KB</p>
                        </div>
                        <div class="resume-actions">
                            <button class="btn btn-sm btn-outline-dark" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-dark" title="Preview">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="resume-section">
                <div class="section-header">
                    <h3>Resume Tips</h3>
                </div>

                <div class="tips-grid">
                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h5>Keep It Simple</h5>
                        <p>Use a clean format with clear sections. Avoid fancy designs that might not print well.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h5>Highlight Achievements</h5>
                        <p>Focus on your accomplishments and impact, not just responsibilities.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h5>Tailor Your Resume</h5>
                        <p>Customize your resume for each job application to match keywords and requirements.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h5>Keep Updated</h5>
                        <p>Update your resume regularly with new skills, experience, and achievements.</p>
                    </div>
                </div>
            </div>

            <div class="resume-section">
                <div class="section-header">
                    <h3>Upload Area</h3>
                </div>

                <div class="upload-zone">
                    <div class="upload-content">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h5>Drag and drop your resume here</h5>
                        <p>or <button class="btn-link">choose from your computer</button></p>
                        <small>Supported formats: PDF (Max 5 MB)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.resume-section {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.resume-section:last-child {
    border-bottom: none;
}

.resume-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.resume-card {
    display: grid;
    grid-template-columns: 50px 1fr auto;
    gap: 1.5rem;
    align-items: center;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
}

.resume-icon {
    font-size: 32px;
    color: #dc2626;
}

.resume-info h5 {
    margin: 0 0 0.5rem 0;
    font-size: 16px;
    font-weight: 600;
}

.resume-actions {
    display: flex;
    gap: 0.5rem;
}

.tips-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

.tip-card {
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    text-align: center;
}

.tip-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #2563eb;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin: 0 auto 1rem;
}

.tip-card h5 {
    margin: 0 0 0.5rem 0;
    font-size: 16px;
    font-weight: 600;
}

.tip-card p {
    margin: 0;
    font-size: 14px;
    color: #64748b;
}

.upload-zone {
    padding: 2rem;
    border: 2px dashed #2563eb;
    border-radius: 12px;
    background: #f0f9ff;
    text-align: center;
    cursor: pointer;
    transition: all 0.25s ease;
}

.upload-zone:hover {
    background: #e0f2fe;
    border-color: #1d4ed8;
}

.upload-content i {
    font-size: 48px;
    color: #2563eb;
    margin-bottom: 1rem;
}

.upload-content h5 {
    margin: 1rem 0 0.5rem 0;
}

.upload-content p {
    margin: 0.5rem 0;
    color: #64748b;
}

.upload-content small {
    color: #94a3b8;
}

.btn-link {
    background: none;
    border: none;
    color: #2563eb;
    cursor: pointer;
    text-decoration: underline;
}

@media (max-width: 991px) {
    .resume-card {
        grid-template-columns: 1fr;
    }

    .resume-actions {
        flex-wrap: wrap;
    }

    .tips-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
