<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Projects
    Route::resource('projects', ProjectsController::class);
    Route::post('/projects/import', [ProjectsController::class, 'import'])->name('project.import');
    Route::get('/projects/export', [ProjectsController::class, 'export'])->name('project.export');

    // Tasks
    Route::get('tasks', [TasksController::class, 'getTasksByProject'])->name('getTasksByProject');
    // Route::get('tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
    // Update task route
    // Route::put('projects/{id}/tasks/{task_id}', [TasksController::class, 'update'])->name('tasks.update');
    
    Route::prefix('projects/{id}')->group(function () {
        Route::resource('tasks', TasksController::class);

        // Additional routes related to tasks within projects
        Route::get('tasks/create', [TasksController::class, 'create'])->name('tasks.create');
        Route::get('tasks/{task_id}/update', [TasksController::class, 'update'])->name('tasks.update');
        Route::get('tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
        
    });
    Route::post('tasks/store', [TasksController::class, 'store'])->name('tasks.store');

    // Import and export routes
    Route::post('tasks/import', [TasksController::class, 'import'])->name('tasks.import');
    Route::get('tasks/export', [TasksController::class, 'export'])->name('tasks.export');
    
        
    // Members
    Route::resource('members', MembersController::class);


});



Auth::routes();
