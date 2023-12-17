<?php

use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // projects
    Route::resource('projects', ProjectsController::class);
    // tasks
    Route::prefix('projects')->group(function () {
        Route::resource('tasks', TasksController::class)->except(['show']);
        Route::get('{id}/tasks', [TasksController::class, 'index'])->name('tasks.index');
        Route::get('tasks', [TasksController::class, 'getTasksByProject'])->name('getTasksByProject');

    });
    // Route::resource('tasks', TasksController::class); 
    Route::resource('members', MembersController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
