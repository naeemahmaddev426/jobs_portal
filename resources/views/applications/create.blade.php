@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('jobs.list') }}">Jobs</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('jobs.show',$job->slug) }}">
                    Job Detail
                </a>
            </li>

            <li class="breadcrumb-item active">
                Apply
            </li>
        </ol>
    </nav>

<div class="card shadow">

<div class="card-header bg-primary text-white">
    <h4>Apply For {{ $job->title }}</h4>
</div>

<div class="card-body">

<form method="POST"
      action="{{ route('jobs.apply',$job) }}"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Name</label>
<input type="text"
       class="form-control"
       value="{{ auth()->user()->name }}"
       readonly>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
       class="form-control"
       value="{{ auth()->user()->email }}"
       readonly>
</div>

<div class="mb-3">
<label>Upload CV</label>
<input type="file"
       name="cv"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Cover Letter</label>
<textarea name="cover_letter"
          rows="6"
          class="form-control"></textarea>
</div>

<button class="btn btn-success">
    Submit Application
</button>

</form>

</div>
</div>

</div>

</div>

</div>

@endsection