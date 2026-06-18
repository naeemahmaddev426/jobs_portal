<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Portal</title>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">

    <div class="container">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/logo.png') }}" style="height:60px; width:auto;">
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <a href="/jobs" class="nav-link-custom">Jobs</a>
            <a href="/companies" class="nav-link-custom">Companies</a>
            <a href="/categories" class="nav-link-custom">Categories</a>
            <a href="{{ route('about') }}" class="nav-link-custom">About</a>
            <a href="{{ route('contact') }}" class="nav-link-custom">Contact</a>

            @auth
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> {{ auth()->user()->name ?? 'User' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        @if(auth()->user()->role === 'admin')
                            <li><h6 class="dropdown-header">Admin Panel</h6></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.jobs') }}"><i class="fas fa-briefcase"></i> Jobs</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.applications') }}"><i class="fas fa-file-alt"></i> Applications</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.companies') }}"><i class="fas fa-building"></i> Companies</a></li>
                        @elseif(auth()->user()->role === 'employer')
                            <li><h6 class="dropdown-header">Employer Panel</h6></li>
                            <li><a class="dropdown-item" href="{{ route('employer.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('employer.company.show') }}"><i class="fas fa-building"></i> Company Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('employer.jobs.create') }}"><i class="fas fa-plus-circle"></i> Post Job</a></li>
                            <li><a class="dropdown-item" href="{{ route('employer.jobs.index') }}"><i class="fas fa-briefcase"></i> My Jobs</a></li>
                            <li><a class="dropdown-item" href="{{ route('employer.applicants') }}"><i class="fas fa-users"></i> Applications</a></li>
                        @else
                            <li><h6 class="dropdown-header">Candidate</h6></li>
                            <li><a class="dropdown-item" href="{{ route('candidate.profile') }}"><i class="fas fa-user"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('candidate.applications') }}"><i class="fas fa-file-alt"></i> My Applications</a></li>
                            <li><a class="dropdown-item" href="{{ route('candidate.saved-jobs') }}"><i class="fas fa-bookmark"></i> Saved Jobs</a></li>
                            <li><a class="dropdown-item" href="{{ route('candidate.resume') }}"><i class="fas fa-file-pdf"></i> Resume</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-cog"></i> Settings</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                                @csrf
                            </form>
                            <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="btn btn-outline-dark">Login</a>
                <a href="/register" class="btn btn-outline-dark">Register</a>
                <a href="{{ route('post-job') }}" class="btn btn-warning">Post a Job</a>
            @endauth
        </div>

    </div>

</nav>

    <div class="container py-5">
        @yield('content')
    </div>
    <footer class="site-footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-3">
                    <div class="footer-brand">Job Portal</div>
                    <p>Your gateway to the best tech careers in Pakistan.</p>
                </div>
                <div class="col-md-3 footer-column">
                    <h4>Company</h4>
                    <a href="{{ url('about') }}">About Us</a>
                    <a href="{{ url('careers') }}">Careers</a>
                    <a href="{{ url('privacy') }}">Privacy Policy</a>
                    <a href="{{ url('terms') }}">Terms &amp; Conditions</a>
                    <a href="{{ url('contact') }}">Contact Us</a>
                </div>
                <div class="col-md-3 footer-column">
                    <h4>Connect</h4>
                    <a href="#" class="footer-social"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.99H7.898v-2.888h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.875h2.773l-.443 2.888h-2.33V21.88C18.343 21.128 22 16.991 22 12z"/></svg> Facebook</a>
                    <a href="#" class="footer-social"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11.5 19h-2.5v-8h2.5v8zm-1.25-9.13c-.8 0-1.45-.66-1.45-1.47 0-.81.65-1.47 1.45-1.47s1.45.66 1.45 1.47c0 .81-.65 1.47-1.45 1.47zm12.75 9.13h-2.5v-4.3c0-1.03-.02-2.36-1.44-2.36-1.45 0-1.67 1.13-1.67 2.29v4.37h-2.5v-8h2.4v1.09h.03c.33-.62 1.14-1.28 2.35-1.28 2.51 0 2.97 1.65 2.97 3.8v4.39z"/></svg> LinkedIn</a>
                    <a href="#" class="footer-social"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.387.6.113.82-.258.82-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.757-1.333-1.757-1.089-.744.084-.729.084-.729 1.205.084 1.84 1.236 1.84 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.418-1.305.76-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.467-2.381 1.235-3.221-.123-.303-.535-1.525.117-3.176 0 0 1.008-.322 3.3 1.23.957-.266 1.98-.399 3-.405 1.02.006 2.043.139 3 .405 2.29-1.552 3.297-1.23 3.297-1.23.654 1.651.242 2.873.118 3.176.77.84 1.233 1.911 1.233 3.221 0 4.61-2.807 5.62-5.48 5.92.43.372.814 1.102.814 2.222v3.293c0 .319.218.694.825.576C20.565 22.092 24 17.593 24 12.297 24 5.67 18.627.297 12 .297z"/></svg> GitHub</a>
                </div>
                <div class="col-md-3 footer-column">
                    <h4>Newsletter</h4>
                    <p>Subscribe for latest jobs</p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Email address">
                        <button type="submit" class="newsletter-btn">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© {{ date('Y') }} Job Portal. All rights reserved.</p>
                <p>Built for modern job seekers and employers.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>