<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;

// Landing page - login
Route::get('/', [UserController::class, 'showLogin'])->name('login');

// login page (alternative route)
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// register page
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// logout
Route::post('/logout', [UserController::class, 'logout']);

// protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/leave', [LeaveRequestController::class, 'store']);
    Route::post('/leave/{id}/status', [LeaveRequestController::class, 'updateStatus']);
});

