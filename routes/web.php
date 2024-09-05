<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController; 
use App\Http\Controllers\ProfileController;   
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BilliardTableController;

                   

// Halaman utama
Route::view('/', 'welcome');

// Halaman home
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::resource('customers', CustomerController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('reservations', ReservationController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('billiard_tables', BilliardTableController::class);
});



// Halaman dashboard
// Route::middleware(['auth'])->group(function () {
//     Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
//     Route::get('profile', [ProfileController::class, 'show'])->name('profile');
//     Route::post('/login', [LoginController::class, 'login'])->name('login');
//     // Route::get('profile', function () {
//     //     return view('profile'); // For views/profile/profile.blade.php
//     // })->name('profile');
// });




// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
//     // Route::get('/profile', function () {
//     //     return view('profile');
//     // })->name('profile');
//     Route::resource('profile', UserController::class)->name('profile');
// });

// Route::middleware(['auth'])->group(function () {
//     // Dashboard route
//     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    
//     // Profile route
   
// });

// Route::resource('profile', [UserController::class, 'show'])->name('profile');

// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Resource routes for managing users
    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    // Profile route for admin (if needed)
    Route::get('profile', [ProfileController::class, 'show'])->name('admin.profile');
});

// Route group for non-admin user routes
Route::middleware(['auth'])->group(function () {
    // User dashboard
    Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    
    // Profile route for regular users
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
});




// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


// Autentikasi bawaan Laravel
require __DIR__.'/auth.php';
