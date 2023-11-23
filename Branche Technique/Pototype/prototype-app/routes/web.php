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
Route::get('members/export', [MemberController::class, 'export'])->name('members.export');  
Route::get('members/import/', [MemberController::class, 'import'])->name('members.import');  



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
       
        Route::prefix('task')->group(function () {
            // task
            Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
            Route::get('/{id}/create', [TaskController::class, 'create'])->name('tasks.create');
            Route::post('/{id}/store', [TaskController::class, 'store'])->name('tasks.store');
            Route::post('/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
            Route::delete('/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
            Route::get('export/', [TaskController::class, 'export'])->name('tasks.export'); // export pojects
            Route::post('import/', [TaskController::class, 'import'])->name('tasks.import');  // import pojects
            Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

        });
    });
    

});



// Route Members
Route::middleware(['auth', 'CheckChefProjet'])->group(function () {
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::get('members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{id}/update', [MemberController::class, 'update'])->name('members.update');
    Route::resource('members', MemberController::class);
    Route::post("members/destroy", [MemberController::class, 'destroy'])->name('membersDelete');

    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('members/store', [MemberController::class, 'store'])->name('members.store');  
    // Route::get('members/export', [MemberController::class, 'export'])->name('members.export');  
    // Route::get('members/import/', [MemberController::class, 'import'])->name('members.import');  
});


// home Page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

