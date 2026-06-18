<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobApplicationController;
use Illuminate\Http\Request;

Route::get('/', [JobListingController::class, 'index'])
    ->name('home');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if (! $user) {
        return redirect()->route('home');
    }

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->hasRole('employer')) {
        return redirect()->route('employer.dashboard');
    }

    return redirect()->route('candidate.profile');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post-job', function () {
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    if (auth()->user()->role !== 'employer') {
        abort(403);
    }

    return redirect()->route('employer.jobs.create');
})->name('post-job');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// CANDIDATE ROUTES
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
            return view('candidate.saved-jobs');
        })->name('saved-jobs');

        Route::get('/resume', function () {
            return view('candidate.resume');
        })->name('resume');
    });

// EMPLOYER ROUTES
Route::get('/employer/dashboard', function () {
    return view('employer.dashboard-enhanced');
})->middleware(['auth','role:employer'])
  ->name('employer.dashboard');

Route::middleware(['auth', 'role:employer'])
    ->prefix('employer')
    ->name('employer.')
    ->group(function () {
        Route::get('/applicants', function () {
            $applications = collect();
            $company = auth()->user()->company;

            if ($company) {
                $jobIds = $company->jobs()->pluck('id');
                $applications = App\Models\JobApplication::with(['user','job'])
                    ->whereIn('job_post_id', $jobIds)
                    ->latest()
                    ->get();
            }

            return view('employer.applicants', compact('applications'));
        })->name('applicants');

        Route::get('/company/create', [CompanyController::class, 'create'])
            ->name('company.create');

        Route::post('/company/store', [CompanyController::class, 'store'])
            ->name('company.store');
        Route::get('/company', [CompanyController::class, 'show'])
            ->name('company.show');

        Route::get('/company/edit', [CompanyController::class, 'edit'])
            ->name('company.edit');

        Route::put('/company/update', [CompanyController::class, 'update'])
            ->name('company.update');

        Route::delete('/company/delete', [CompanyController::class, 'destroy'])
            ->name('company.delete');
        Route::get('/jobs', [JobController::class, 'index'])
            ->name('jobs.index');

        Route::get('/jobs/create', [JobController::class, 'create'])
            ->name('jobs.create');

        Route::post('/jobs/store', [JobController::class, 'store'])
            ->name('jobs.store'); 
        Route::get('/jobs/{job}/edit', [JobController::class,'edit'])
            ->name('jobs.edit');

        Route::put('/jobs/{job}', [JobController::class,'update'])
            ->name('jobs.update');

        Route::delete('/jobs/{job}', [JobController::class,'destroy'])
            ->name('jobs.destroy');       
    });

// ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

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
    Route::get('/jobs', [JobListingController::class, 'index'])
    ->name('jobs.list');

    Route::get('/jobs/{slug}', [JobListingController::class, 'show'])
    ->name('jobs.show');
    Route::middleware(['auth'])->group(function () {

        Route::get(
            '/jobs/{job}/apply',
            [JobApplicationController::class,'create']
        )->name('jobs.apply.form');

        Route::post(
            '/jobs/{job}/apply',
            [JobApplicationController::class,'store']
        )->name('jobs.apply');

    });

require __DIR__.'/auth.php';

// Static pages: About & Contact
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

    // Log the message for now; replace with mail/send logic later.
    logger()->info('Contact form submitted', $request->only('name','email','message'));

    return redirect()->route('contact')->with('status', 'Thanks — we received your message.');
})->name('contact.send');

// Companies and Categories pages
Route::view('/companies', 'companies')->name('companies');
Route::get('/categories', function () {
    return view('categories');
})->name('categories');
