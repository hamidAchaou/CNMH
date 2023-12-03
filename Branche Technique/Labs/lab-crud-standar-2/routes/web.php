<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Projects
Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
Route::resource('projects', ProjectsController::class);

// tasks
Route::resource('tasks', TasksController::class);