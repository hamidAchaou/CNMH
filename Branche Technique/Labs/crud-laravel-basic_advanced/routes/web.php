<?php

use App\Http\Controllers\CompetencesController;
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



Route::get('/', [CompetencesController::class, 'index'])->name('competences.index'); // show page get all competences
Route::get('/create', [CompetencesController::class, 'create'])->name("competences.create"); // show page create Competences
Route::post('/store', [CompetencesController::class, 'store'])->name("competences.store"); // add competences in databases
Route::get('/{id}/edit', [CompetencesController::class, 'edit'])->name("competences.edit"); // show edit competences
Route::put('/update/{id}', [CompetencesController::class, 'update'])->name("competences.update");
Route::delete('/destroy', [CompetencesController::class, 'destroy'])->name("competences.destroy");

Route::post('/search-competences', [CompetencesController::class, 'searchCompetences'])->name('search.competences');
