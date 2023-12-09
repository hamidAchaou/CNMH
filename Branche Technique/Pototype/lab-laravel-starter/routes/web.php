<?php

use App\Http\Controllers\MembersController;
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

Route::middleware('auth')->group(function () {
    
    // projects
    Route::resource('projects', ProjectsController::class);

    // tasks
    Route::prefix('projects')->group(function () {
        Route::get('{id}/tasks', [TasksController::class, 'index'])->name('projects.tasks');
    
        Route::resource('tasks', TasksController::class); 
    });
    

    // Members
    Route::resource('members', MembersController::class);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
