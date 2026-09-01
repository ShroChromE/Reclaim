<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\ClaimController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

// Public homepage
Route::get('/', [ItemController::class, 'homepage'])->name('homepage');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Items — one line for all 7 routes
    Route::resource('items', ItemController::class);

    Route::get('/my-reports', [MyReportController::class, 'index'])->name('my-reports.index');

    // Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/items', [ManageController::class, 'index'])->name('admin.items.index');
    Route::patch('/admin/claims/{item}', [ClaimController::class, 'update'])->name('admin.claims.update');
});

require __DIR__.'/auth.php';