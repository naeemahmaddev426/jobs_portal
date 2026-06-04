<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\JobController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin-dashboard', function () {
    return 'Admin Dashboard';
})->middleware('role:admin');
Route::get('/employer/dashboard', function () {
    return view('employer.dashboard');
})->middleware(['auth','role:employer'])
  ->name('employer.dashboard');
Route::middleware(['auth', 'role:employer'])
    ->prefix('employer')
    ->name('employer.')
    ->group(function () {

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

require __DIR__.'/auth.php';
