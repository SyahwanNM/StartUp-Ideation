<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmcController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [BmcController::class, 'index'])->name('bmc.landing');
Route::get('/create', [BmcController::class, 'create'])->name('bmc.create');
Route::post('/store', [BmcController::class, 'store'])->name('bmc.store');
Route::get('/show/{id}', [BmcController::class, 'show'])->name('bmc.show')->where('id', '[0-9]+');
Route::get('/edit/{id}', [BmcController::class, 'edit'])->name('bmc.edit')->where('id', '[0-9]+');
Route::put('/update/{id}', [BmcController::class, 'update'])->name('bmc.update')->where('id', '[0-9]+');
Route::delete('/delete/{id}', [BmcController::class, 'destroy'])->name('bmc.destroy')->where('id', '[0-9]+');
Route::get('/duplicate/{id}', [BmcController::class, 'duplicate'])->name('bmc.duplicate')->where('id', '[0-9]+');

// Test error pages (remove in production)
Route::get('/test-404', function () {
    abort(404);
});

Route::get('/test-500', function () {
    abort(500);
});

Route::get('/test-403', function () {
    abort(403);
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes (protected)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/show/{id}', [AdminController::class, 'show'])->name('admin.show')->where('id', '[0-9]+');
    Route::get('/export', [AdminController::class, 'export'])->name('admin.export');
});
