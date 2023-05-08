<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumSongController;
use App\Http\Controllers\SongAlbumController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->middleware('auth')->name('songs.create');
Route::get('/songs/{id}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/{id}/edit', [SongController::class, 'edit'])->middleware('auth')->name('songs.edit');
Route::post('/songs', [SongController::class, 'store'])->middleware('auth');
Route::delete('/songs/{id}', [SongController::class, 'destroy'])->middleware('auth');
Route::put('/songs/{id}', [SongController::class, 'update'])->middleware('auth');




Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create')->middleware('auth');
Route::get('/bands/{id}', [BandController::class, 'show'])->name('bands.show');
Route::get('/bands/{id}/edit', [BandController::class, 'edit'])->name('bands.edit')->middleware('auth');
Route::post('/bands', [BandController::class, 'store'])->middleware('auth');
Route::delete('/bands/{id}', [BandController::class, 'destroy'])->middleware('auth');
Route::put('/bands/{id}', [BandController::class, 'update'])->middleware('auth');




Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->middleware('auth');
Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit')->middleware('auth');
Route::post('/albums', [AlbumController::class, 'store'])->middleware('auth');
Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->middleware('auth');
Route::put('/albums/{id}', [AlbumController::class, 'update'])->middleware('auth');

Route::put('/albums/{album}/songs/{song}', [AlbumSongController::class, 'store'])->name('album_song.store');
Route::delete('/albums/{album}/songs/{song}', [AlbumSongController::class, 'destroy'])->name('album_song.destroy');





require __DIR__.'/auth.php';
