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



// Route Members
Route::middleware(['auth', 'CheckChefProjet'])->group(function () {
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::get('members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{id}/update', [MemberController::class, 'update'])->name('members.update');
    Route::resource('members', MemberController::class);
    Route::post("members/destroy", [MemberController::class, 'destroy'])->name('membersDelete');

    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('members/store', [MemberController::class, 'store'])->name('members.store');  
    Route::get('members/export/', [MemberController::class, 'export'])->name('members.export');  
    Route::get('members/import/', [MemberController::class, 'import'])->name('members.import');  
});


// home Page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

require __DIR__.'/projects.php';
