<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'process'])->name('login.process');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'destroy'])->name('login.destroy');

    // admin route
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    });

    // user route
    Route::middleware('user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
    });
});
