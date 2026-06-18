<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ============================================================================
// PUBLIC ROUTES - Accessible to all visitors
// ============================================================================

// Homepage
Route::get('/', [JobListingController::class, 'index'])->name('home');

// Job Listing & Details
Route::get('/jobs', [JobListingController::class, 'index'])->name('jobs.list');
Route::get('/jobs/{slug}', [JobListingController::class, 'show'])->name('jobs.show');

// Public Company Profile
Route::get('/company/{company}', function (\App\Models\Company $company) {
    $jobs = $company->jobs()->where('status', 1)->latest()->paginate(12);
    return view('company.profile', compact('company', 'jobs'));
})->name('company.profile');

// Static Pages
Route::view('/about', 'about')->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/send', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string'
    ]);
    logger()->info('Contact form submitted', $request->only('name','email','message'));
    return redirect()->route('contact')->with('status', 'Thanks — we received your message.');
})->name('contact.send');

Route::view('/companies', 'companies')->name('companies');
Route::get('/categories', function () {
    return view('categories');
})->name('categories');

// ============================================================================
// AUTHENTICATED ROUTES - User account & profile management
// ============================================================================

Route::middleware('auth')->group(function () {
    // Universal Dashboard (redirects to role-specific dashboard)
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('employer')) {
            return redirect()->route('employer.dashboard');
        }
        return redirect()->route('candidate.profile');
    })->middleware('verified')->name('dashboard');

    // Redirect helper for posting jobs
    Route::get('/post-job', function () {
        abort_if(!auth()->user()->hasRole('employer'), 403);
        return redirect()->route('employer.jobs.create');
    })->name('post-job');

    // User Profile Management (all roles)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Job Application - Create & Submit
    Route::get('/jobs/{job}/apply', [JobApplicationController::class, 'create'])->name('jobs.apply.form');
    Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply');

    // Candidate - Save/Unsave Jobs
    Route::post('/jobs/{job}/save', function (\App\Models\JobPost $job) {
        $saved = auth()->user()->savedJobs()->where('job_post_id', $job->id)->first();
        if ($saved) {
            $saved->delete();
            return back()->with('status', 'Job removed from saved list.');
        }
        auth()->user()->savedJobs()->create(['job_post_id' => $job->id]);
        return back()->with('status', 'Job saved successfully.');
    })->name('jobs.save');
});

// ============================================================================
// CANDIDATE ROUTES - Role-based dashboard & profile
// ============================================================================

Route::middleware(['auth', 'role:candidate'])
    ->prefix('candidate')
    ->name('candidate.')
    ->group(function () {
        Route::get('/profile', function () {
            $applications = auth()->user()->applications()->with('job.company')->latest()->get();
            return view('candidate.profile', compact('applications'));
        })->name('profile');

        Route::get('/applications', function () {
            $applications = auth()->user()->applications()->with('job.company')->latest()->get();
            return view('candidate.applications', compact('applications'));
        })->name('applications');

        Route::get('/saved-jobs', function () {
            $savedJobs = auth()->user()->savedJobs()->with('job.company')->latest()->paginate(12);
            return view('candidate.saved-jobs', compact('savedJobs'));
        })->name('saved-jobs');

        Route::get('/resume', function () {
            return view('candidate.resume');
        })->name('resume');
    });

// ============================================================================
// EMPLOYER ROUTES - Company & job management
// ============================================================================

Route::middleware(['auth', 'role:employer'])
    ->name('employer.')
    ->group(function () {
        // Dashboard
        Route::get('/employer/dashboard', function () {
            return view('employer.dashboard-enhanced');
        })->name('dashboard');

        // Applicants
        Route::get('/employer/applicants', function () {
            $applications = collect();
            $company = auth()->user()->company;
            if ($company) {
                $jobIds = $company->jobs()->pluck('id');
                $applications = \App\Models\JobApplication::with(['user', 'job'])
                    ->whereIn('job_post_id', $jobIds)
                    ->latest()
                    ->get();
            }
            return view('employer.applicants', compact('applications'));
        })->name('applicants');

        // Company Management
        Route::prefix('employer/company')->name('company.')->group(function () {
            Route::get('/create', [CompanyController::class, 'create'])->name('create');
            Route::post('/store', [CompanyController::class, 'store'])->name('store');
            Route::get('/', [CompanyController::class, 'show'])->name('show');
            Route::get('/edit', [CompanyController::class, 'edit'])->name('edit');
            Route::put('/update', [CompanyController::class, 'update'])->name('update');
            Route::delete('/delete', [CompanyController::class, 'destroy'])->name('delete');
        });

        // Job Management (RESTful)
        Route::prefix('employer/jobs')->name('jobs.')->group(function () {
            Route::get('/', [JobController::class, 'index'])->name('index');
            Route::get('/create', [JobController::class, 'create'])->name('create');
            Route::post('/', [JobController::class, 'store'])->name('store');
            Route::get('/{job}/edit', [JobController::class, 'edit'])->name('edit');
            Route::put('/{job}', [JobController::class, 'update'])->name('update');
            Route::delete('/{job}', [JobController::class, 'destroy'])->name('destroy');
        });

        // Application Management
        Route::prefix('applications')->name('')->group(function () {
            Route::post('/{application}/accept', function (\App\Models\JobApplication $application) {
                $job = $application->job;
                abort_if(!auth()->user()->company || $job->company_id !== auth()->user()->company->id, 403);
                $application->update(['status' => 'accepted']);
                return back()->with('status', 'Application accepted.');
            })->name('applications.accept');

            Route::post('/{application}/reject', function (\App\Models\JobApplication $application) {
                $job = $application->job;
                abort_if(!auth()->user()->company || $job->company_id !== auth()->user()->company->id, 403);
                $application->update(['status' => 'rejected']);
                return back()->with('status', 'Application rejected.');
            })->name('applications.reject');

            Route::get('/{application}/download-cv', function (\App\Models\JobApplication $application) {
                $job = $application->job;
                abort_if(!auth()->user()->company || $job->company_id !== auth()->user()->company->id, 403);
                $filePath = storage_path('app/' . $application->cv);
                abort_if(!file_exists($filePath), 404);
                return response()->download($filePath, 'cv_' . $application->user->name . '.pdf');
            })->name('applications.download-cv');
        });
    });

// ============================================================================
// ADMIN ROUTES - System management & analytics
// ============================================================================

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', function () {
            $stats = [
                'users' => \App\Models\User::count(),
                'companies' => \App\Models\Company::count(),
                'jobs' => \App\Models\JobPost::where('status', 1)->count(),
                'applications' => \App\Models\JobApplication::count(),
            ];
            $recentUsers = \App\Models\User::latest()->limit(5)->get();
            return view('admin.dashboard', compact('stats', 'recentUsers'));
        })->name('dashboard');

        // Management Pages
        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');

        Route::get('/jobs', function () {
            return view('admin.jobs');
        })->name('jobs');

        Route::get('/applications', function () {
            return view('admin.applications');
        })->name('applications');

        Route::get('/companies', function () {
            return view('admin.companies');
        })->name('companies');
    });

// ============================================================================
// AUTHENTICATION ROUTES - Login, register, password reset (Jetstream)
// ============================================================================

require __DIR__.'/auth.php';
