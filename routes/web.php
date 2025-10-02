<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmcController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TamSamSomController;
use App\Http\Controllers\FinancialProjectionController;

Route::get('/', [BmcController::class, 'index'])->name('bmc.landing');
Route::get('/create', [BmcController::class, 'create'])->name('bmc.create');
Route::post('/store', [BmcController::class, 'store'])->name('bmc.store');
Route::get('/show/{id}', [BmcController::class, 'show'])->name('bmc.show')->where('id', '[0-9]+');
Route::get('/edit/{id}', [BmcController::class, 'edit'])->name('bmc.edit')->where('id', '[0-9]+');
Route::put('/update/{id}', [BmcController::class, 'update'])->name('bmc.update')->where('id', '[0-9]+');
Route::delete('/delete/{id}', [BmcController::class, 'destroy'])->name('bmc.destroy')->where('id', '[0-9]+');
Route::get('/duplicate/{id}', [BmcController::class, 'duplicate'])->name('bmc.duplicate')->where('id', '[0-9]+');

// TAM SAM SOM routes
Route::prefix('tam-sam-som')->group(function () {
    Route::get('/', [TamSamSomController::class, 'index'])->name('tam-sam-som.index');
    Route::get('/create', [TamSamSomController::class, 'create'])->name('tam-sam-som.create');
    Route::post('/store', [TamSamSomController::class, 'store'])->name('tam-sam-som.store');
    Route::get('/show/{id}', [TamSamSomController::class, 'show'])->name('tam-sam-som.show')->where('id', '[0-9]+');
    Route::get('/edit/{id}', [TamSamSomController::class, 'edit'])->name('tam-sam-som.edit')->where('id', '[0-9]+');
    Route::put('/update/{id}', [TamSamSomController::class, 'update'])->name('tam-sam-som.update')->where('id', '[0-9]+');
    Route::delete('/delete/{id}', [TamSamSomController::class, 'destroy'])->name('tam-sam-som.destroy')->where('id', '[0-9]+');
});

// Financial Projection routes
Route::prefix('financial-projection')->group(function () {
    Route::get('/', [FinancialProjectionController::class, 'index'])->name('financial-projection.index');
    Route::get('/create', [FinancialProjectionController::class, 'create'])->name('financial-projection.create');
    Route::post('/store', [FinancialProjectionController::class, 'store'])->name('financial-projection.store');
    Route::get('/show/{id}', [FinancialProjectionController::class, 'show'])->name('financial-projection.show')->where('id', '[0-9]+');
    Route::get('/edit/{id}', [FinancialProjectionController::class, 'edit'])->name('financial-projection.edit')->where('id', '[0-9]+');
    Route::put('/update/{id}', [FinancialProjectionController::class, 'update'])->name('financial-projection.update')->where('id', '[0-9]+');
    Route::delete('/delete/{id}', [FinancialProjectionController::class, 'destroy'])->name('financial-projection.destroy')->where('id', '[0-9]+');
});

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
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy')->where('id', '[0-9]+');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});
