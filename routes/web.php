<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::domain('{tenantsos}')->middleware('web')->group(function () {
    Route::get('/', function (string $tenant) {
        return Inertia::render('dashboard');
    });
});
Route::domain('{tenant}.tenantsos')->middleware('web')->group(function () {
    Route::get('/', function (string $tenant) {
        return Inertia::render('dashboard');
    });
});

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
