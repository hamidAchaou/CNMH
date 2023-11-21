<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

// project
Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/{id}/show', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/destroy', [ProjectController::class, 'destroy'])->name('projects.destroy');


Route::prefix('tasks')->group(function () {
    // task
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/{id}/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/{id}/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
});
