<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\ClaimController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('items', ItemController::class);

    // Admin
    // To do : restrict this group to admins once the `role` column + admin middleware exist;
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/items', [ItemController::class, 'index'])->name('items.index');
        Route::get('/claims', [ClaimController::class, 'index'])->name('claims.index');
        Route::patch('/claims/{item}', [ClaimController::class, 'update'])->name('claims.update');
    });
});

require __DIR__.'/auth.php';