<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;

// Halaman utama
Route::view('/', 'welcome');

// Halaman home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman dashboard
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'admin.redirect'])
    ->name('dashboard');

// Halaman profil
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Grup rute untuk admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Rute resource untuk fitur CRUD pengguna
    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users', // Mendefinisikan nama rute 'admin.users' untuk metode 'index'
    ]);

    // Halaman dashboard admin
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Autentikasi bawaan Laravel
require __DIR__.'/auth.php';
