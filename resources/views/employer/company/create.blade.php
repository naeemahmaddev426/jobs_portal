@extends('layouts.employer')

@section('content')
<style>
    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        border-color: #007bff;
    }
</style>

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Create Company</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('employer.company.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter company name"
                                value="{{ old('name') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input
                                type="text"
                                name="website"
                                class="form-control"
                                placeholder="https://example.com"
                                value="{{ old('website') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input
                                type="text"
                                name="location"
                                class="form-control"
                                placeholder="Enter company location"
                                value="{{ old('location') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea
                                name="description"
                                rows="5"
                                class="form-control"
                                placeholder="Write company description"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                Save Company
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection