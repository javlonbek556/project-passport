<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;     
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.register');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('users.index');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::resource('/users', UserController::class)->names('users');
});


Route::middleware(['auth', 'check.passport'])->group(function () {
    Route::get('/passport/create', [PassportController::class, 'create'])->name('passport.create');
    Route::post('/passport', [PassportController::class, 'store'])->name('passport.store');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/passport', [PassportController::class, 'index'])->name('passport.index');
    Route::get('/passport/{id}', [PassportController::class, 'show'])->name('passport.show');
    Route::get('/passport/{id}/edit', [PassportController::class, 'edit'])->name('passport.edit');
    Route::put('/passport/{id}', [PassportController::class, 'update'])->name('passport.update');
    Route::delete('/passport/{id}', [PassportController::class, 'destroy'])->name('passport.destroy');
});
