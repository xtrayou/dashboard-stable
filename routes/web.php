<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Development route untuk create admin user
Route::get('/create-admin', [AuthController::class, 'createAdmin'])->name('create.admin');

// Public Dashboard routes (tidak perlu login)
Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard.index');
Route::get('/dashboard/data', [DashboardController::class, 'getData'])->name('dashboard.data');
Route::get('/dashboard/opd/{id}', [DashboardController::class, 'opd'])->name('dashboard.opd');

// Protected Admin routes (perlu login)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/upload', [AdminController::class, 'upload'])->name('upload');
    Route::post('/import', [AdminController::class, 'import'])->name('import');
    Route::delete('/domain/{domain}', [AdminController::class, 'destroy'])->name('domain.destroy');

    // Profile routes
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});
