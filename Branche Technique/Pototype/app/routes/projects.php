<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Member;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    // Projects
    Route::resource('projects', ProjectController::class);
    Route::get("projects/{id}/show", [ProjectController::class, 'show'])->name('projects.show');
    Route::get("projects/{id}/edit", [ProjectController::class, 'edit'])->name('projects.edit');
    Route::delete("/destroy", [ProjectController::class, 'destroy'])->name('projectsDelete');
    Route::post('/search-projects', [ProjectController::class, 'searchProjects'])->name('search-projects');

    // Task
    Route::get('tasks/create/{id}', [TaskController::class, 'create'])->name('create.task');
    Route::post("tasks/store", [TaskController::class, 'store'])->name('store.Task');
    Route::get("tasks/{id}/edit", [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put("tasks/{id}/update", [TaskController::class, 'update'])->name('update.task');
    Route::post("tasks/destroy", [TaskController::class, 'destroy'])->name('task.delete');
});


Route::middleware(['auth', 'CheckChefProjet'])->group(function () {
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::get('members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{id}/update', [MemberController::class, 'update'])->name('members.update');
    Route::resource('members', MemberController::class);
    Route::post("members/destroy", [MemberController::class, 'destroy'])->name('membersDelete');
    
});


?>