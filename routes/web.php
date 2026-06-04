<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\CompanyController;

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
})->middleware(['auth','role:employer']);
Route::middleware(['auth', 'role:employer'])
    ->prefix('employer')
    ->name('employer.')
    ->group(function () {

        Route::get('/company/create', [CompanyController::class, 'create'])
            ->name('company.create');

        Route::post('/company/store', [CompanyController::class, 'store'])
            ->name('company.store');
    });

require __DIR__.'/auth.php';
