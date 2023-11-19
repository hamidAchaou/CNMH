<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::prefix('projects')->middleware('auth')->group(function () {

    // project
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{id}/show', [ProjectController::class, 'show'])->name('projects.show');
    // export pojects
    Route::get('export/', [ProjectController::class, 'export'])->name('projects.export');
    Route::post('import/', [ProjectController::class, 'import'])->name('projects.import');

    // task
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    
    // check chef project
    Route::middleware(['auth', 'CheckChefProjet'])->group(function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/destroy', [ProjectController::class, 'destroy'])->name('projects.destroy');
       
        Route::prefix('task')->group(function () {
            // task
            Route::get('/{id}/create', [TaskController::class, 'create'])->name('tasks.create');
            Route::post('/{id}/store', [TaskController::class, 'store'])->name('tasks.store');
            Route::delete('/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
            Route::post('/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
            Route::get('/export/', [TaskController::class, 'export'])->name('tasks.export'); // export pojects
            Route::post('/import/', [TaskController::class, 'import'])->name('tasks.import');  // import pojects
        });
    });
    

});


?>