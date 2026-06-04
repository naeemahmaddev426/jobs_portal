@extends('layouts.employer')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Company Profile</h4>

            <a href="{{ route('employer.company.edit') }}"
               class="btn btn-light btn-sm">
                Edit Company
            </a>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>Company Name:</strong>
                <p>{{ $company->name }}</p>
            </div>

            <div class="mb-3">
                <strong>Website:</strong>
                <p>{{ $company->website }}</p>
            </div>

            <div class="mb-3">
                <strong>Location:</strong>
                <p>{{ $company->location }}</p>
            </div>

            <div class="mb-3">
                <strong>Description:</strong>
                <p>{{ $company->description }}</p>
            </div>

        </div>

    </div>

</div>

@endsection