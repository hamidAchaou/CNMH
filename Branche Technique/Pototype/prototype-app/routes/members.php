<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


// Route Members
Route::prefix('members')->middleware(['auth', 'CheckChefProjet'])->group(function () {
    Route::resource('', MemberController::class);
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    Route::get('/search', [MemberController::class, 'search'])->name('members.search');
    Route::get('/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('/{id}/update', [MemberController::class, 'update'])->name('members.update');
    Route::post("/destroy", [MemberController::class, 'destroy'])->name('membersDelete');
    Route::get('/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/store', [MemberController::class, 'store'])->name('members.store');  
    Route::get('/export/', [MemberController::class, 'export'])->name('members.export');  
    Route::get('/import/', [MemberController::class, 'import'])->name('members.import');  
});



?>