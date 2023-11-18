<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MemberController;
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

Route::prefix('projects')->middleware('auth')->group(function () {

    // project
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{id}/show', [ProjectController::class, 'show'])->name('projects.show');
    // export pojects
    Route::get('export/', [ProjectController::class, 'export'])->name('projects.export');
    Route::post('import/', [ProjectController::class, 'import'])->name('projects.import');
    
    // check chef project
    Route::middleware(['auth', 'CheckChefProjet'])->group(function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/destroy', [ProjectController::class, 'destroy'])->name('projects.destroy');
        
        // task
        Route::get('/task/{id}/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/task/{id}/store', [TaskController::class, 'store'])->name('tasks.store');
        Route::delete('/task/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
        Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::post('/tasks/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
    });
    

});

// Route Members
Route::middleware(['auth', 'CheckChefProjet'])->group(function () {
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::get('members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{id}/update', [MemberController::class, 'update'])->name('members.update');
    Route::resource('members', MemberController::class);
    Route::post("members/destroy", [MemberController::class, 'destroy'])->name('membersDelete');

    Route::get('/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/store', [MemberController::class, 'store'])->name('members.store');    
});


// home Page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

