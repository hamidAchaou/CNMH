<?php

use App\Http\Controllers\ProfileController;
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

// Projects
Route::resource('projects', ProjectController::class);
Route::delete("/destroy", [ProjectController::class, 'destroy'])->name('projectsDelete');

// Route::delete('/destroy/{id}', [ProjectController::class, 'destroy'])->name("projects.destroy");

// Task
Route::post("/store", [TaskController::class, 'store'])->name('createTask');
Route::get("tasks/edit/{id}", [TaskController::class, 'edit'])->name('tasks.edit');
Route::post("/task/update/{id}", [TaskController::class, 'update'])->name('tasks.update');
Route::post("/destroy", [TaskController::class, 'destroy'])->name('task.delete');
Route::post("/tasks/{id}/status", [TaskController::class, 'addStatusTask'])->name('tasks.addStatusTask'); // Status Tasks



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/projects', function () {
//     return view('projects.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
