<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand">
            Jobs Portal
        </a>

        <span class="text-white">
            {{ auth()->user()->name }}
        </span>

    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-dark min-vh-100">

            <div class="pt-3">

                <h5 class="text-white mb-4">
                    Employer Panel
                </h5>

                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a href="/employer/dashboard"
                            class="nav-link text-white {{ request()->is('employer/dashboard') ? 'fw-bold text-warning' : '' }}">
                                Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        @if(auth()->user()->company)

                            <a href="{{ route('employer.company.show') }}"
                            class="nav-link text-white">
                                Company Profile
                            </a>

                        @else

                            <a href="{{ route('employer.company.create') }}"
                            class="nav-link text-white">
                                Create Company
                            </a>

                        @endif
                    </li>

                </ul>

            </div>

        </div>

        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>