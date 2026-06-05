<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Portal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                Jobs Portal
            </a>

            <div>

                <a href="/jobs" class="text-white text-decoration-none me-3">
                    Jobs
                </a>

                <a href="/login" class="text-white text-decoration-none me-3">
                    Login
                </a>

                <a href="/register" class="btn btn-light btn-sm">
                    Register
                </a>

            </div>

        </div>
    </nav>

    <div class="container mx-auto mt-5">
        @yield('content')
    </div>

</body>
</html>