<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
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

Route::middleware(['auth', 'checkRole'])->group(function () {
    Route::get('/players/home', [PlayerController::class, 'index'])->name('players.index');
    Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/players/create', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/players/delete/{id}', [PlayerController::class, 'destroy'])->name('players.delete');
    Route::get('/players/edit/{id}', [PlayerController::class, 'edit'])->name('players.edit');
    Route::post('/players/edit/{id}', [PlayerController::class, 'update'])->name('players.update');



    Route::get('/teams/home', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/create', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/delete/{id}', [TeamController::class, 'destroy'])->name('teams.delete');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/edit/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::get('/teams/info/{id}', [TeamController::class, 'info'])->name('teams.info');


    Route::get('/matches/home', [MatchController::class, 'index'])->name('matches.index')->withoutMiddleware('checkRole');
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches/create', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/delete/{id}', [MatchController::class, 'destroy'])->name('matches.delete');
    Route::get('/matches/edit/{id}', [MatchController::class, 'edit'])->name('matches.edit');
    Route::post('/matches/edit/{id}', [MatchController::class, 'update'])->name('matches.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/', '/login');
