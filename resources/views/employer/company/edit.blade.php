@extends('layouts.employer')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Company</h4>
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

            <form action="{{ route('employer.company.update') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">
                        Company Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name',$company->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Website
                    </label>

                    <input type="text"
                           name="website"
                           class="form-control"
                           value="{{ old('website',$company->website) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Location
                    </label>

                    <input type="text"
                           name="location"
                           class="form-control"
                           value="{{ old('location',$company->location) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              rows="5"
                              class="form-control">{{ old('description',$company->description) }}</textarea>
                </div>

                <button type="submit"
                        class="btn btn-warning">
                    Update Company
                </button>

            </form>

            <hr>

            <form action="{{ route('employer.company.delete') }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger"
                        onclick="return confirm('Delete Company?')">
                    Delete Company
                </button>

            </form>

        </div>

    </div>

</div>

@endsection