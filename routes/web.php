<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('tracks', TrackController::class);

Route::get('/', [PageController::class, 'index'])->name('homepage');

//Rotta per la lista della risorsa
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');

//Rotta per il dettaglio della risorsa
Route::get('tracks{track}', [TrackController::class, 'show'])->name('tracks.show');

//Rotta per la creazione della risorsa
Route::get('tracks/create', [TrackController::class, 'create'])->name('tracks.create');

//Rotta per la salvataggio della risorsa
Route::post('tracks', [TrackController::class, 'store'])->name('tracks.store');