<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Job Portal</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #f3f4f6; }
        .admin-navbar { background: #0f172a; }
        .admin-navbar .navbar-brand, .admin-navbar .navbar-text { color: #ffffff; }
        .admin-navbar .nav-link { color: rgba(255,255,255,.75); }
        .admin-navbar .nav-link.active, .admin-navbar .nav-link:hover { color: #ffffff; }
        .admin-footer { background: #111827; color: rgba(255,255,255,.65); padding: 1.5rem 0; }
        .admin-footer a { color: rgba(255,255,255,.75); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg admin-navbar shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-shield-alt me-2"></i> Admin Panel
            </a>
            <div class="d-flex align-items-center gap-3 ms-auto">
                <span class="navbar-text text-white d-none d-md-inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm">Back to Site</a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container-fluid py-4">
        @yield('content')
    </main>

    <footer class="admin-footer text-center">
        <div class="container">
            <p class="mb-1">© {{ date('Y') }} Job Portal. Admin dashboard.</p>
            <p class="mb-0">Designed for administrators to manage jobs, users, companies and applications.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
