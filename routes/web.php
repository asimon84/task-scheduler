<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/projects', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/tasks', [DashboardController::class, 'index'])->name('dashboard');
