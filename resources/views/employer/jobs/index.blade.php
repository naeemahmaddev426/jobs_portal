@extends('layouts.employer')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>My Jobs</h2>

        <a href="{{ route('employer.jobs.create') }}"
            class="btn btn-success">
            Create Job
        </a>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Type</th>
                <th>Deadline</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($jobs as $job)

                <tr>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->location }}</td>
                    <td>{{ $job->salary }}</td>
                    <td>{{ $job->job_type }}</td>
                    <td>{{ $job->deadline }}</td>
                    <td>

                    <a href="{{ route('employer.jobs.edit',$job->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('employer.jobs.destroy',$job->id) }}"
                        method="POST"
                        style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete this job?')"
                            class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        No Jobs Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection