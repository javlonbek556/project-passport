<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PassportController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::resource('/passport', PassportController::class)->names('passport');
});

// Guest routes (login/register)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('login'); // login form
    Route::post('/login', [UserController::class, 'login'])->name('login.perform'); // login submit

    Route::get('/home', function () {
        return view('welcome'); // yoki dashboard sahifa
    })->name('home'); // <<== home routeni to‘g‘ri yopish
    
    Route::resource('/users', UserController::class)->names('users');
});

// Passport-specific middleware
Route::middleware(['auth', 'check.passport'])->group(function () {
    Route::get('/passport/create', [PassportController::class, 'create'])->name('passport.create');
    Route::post('/passport', [PassportController::class, 'store'])->name('passport.store');
});
