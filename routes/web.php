<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/projects', [DashboardController::class, 'getProjectList'])->name('projects-list');
Route::post('/priority', [DashboardController::class, 'updatePriority'])->name('priority');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/table', [ProjectController::class, 'getTable'])->name('projects.get-table');
Route::post('/project', [ProjectController::class, 'create'])->name('project.create');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/{id}/schedule', [ProjectController::class, 'index'])->name('project.schedule');
Route::put('/project/{id}', [ProjectController::class, 'edit'])->name('project.update');
Route::patch('/project/{id}', [ProjectController::class, 'edit'])->name('project.update');
Route::post('/project/{id}', [ProjectController::class, 'edit'])->name('project.update');
Route::delete('/project/{id}', [ProjectController::class, 'delete'])->name('project.delete');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/table', [TaskController::class, 'getTable'])->name('tasks.get-table');
Route::post('/task', [TaskController::class, 'create'])->name('task.create');
Route::get('/task/{id}', [TaskController::class, 'show'])->name('task.show');
Route::put('/task/{id}', [TaskController::class, 'edit'])->name('task.update');
Route::patch('/task/{id}', [TaskController::class, 'edit'])->name('task.update');
Route::post('/task/{id}', [TaskController::class, 'edit'])->name('task.update');
Route::delete('/task/{id}', [TaskController::class, 'delete'])->name('task.delete');
