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
use App\Http\Controllers\MemberController;

// // member route
// Route::middleware(['auth'])->group(function () {
    
//     Route::get("/members", [MemberController::class, 'index'])->name('members.index'); // get all members
//     Route::resource("members", MemberController::class); 
//     Route::get('members', [MemberController::class, 'store'])->name('members.store');
//     Route::get('members/search', [MemberController::class, 'search'])->name('members.search');



// });



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
require __DIR__.'/projects.php';
