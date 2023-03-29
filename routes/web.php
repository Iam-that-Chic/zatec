<?php

use App\Http\Controllers\AlbumsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\LastfmController;

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

//google auth
Route::get('auth/google', [SocialAuthController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/callback', [SocialAuthController::class, 'callback']);
Route::post('/logout', [SocialAuthController::class, 'logout'])->name('logout');

//lastfm controller 
Route::get('dashboard', [LastfmController::class, 'index'])->name('dashboard');
Route::post('/search', [LastfmController::class, 'search'])->name('search');
Route::get('/search', [LastfmController::class, 'show'])->name('search');
Route::get('/{artist}/{album}/album-info', [LastfmController::class, 'showAlbum'])->name('showalbum');
Route::get('/{artist}/artist-info', [LastfmController::class, 'showArtist'])->name('showartist');

// user favorites 
//album controller
Route::get('/favorite-albums', [AlbumsController::class, 'index'])->name('favalbums');
Route::post('/fav-album', [AlbumsController::class, 'store'])->name('album.store');
Route::delete('{id}/unfav-album', [AlbumsController::class, 'delete'])->name('album.delete');

//artist controller
Route::get('/favorite-artists', [ArtistsController::class, 'index'])->name('favartists');
Route::post('/fav-artist', [ArtistsController::class, 'store'])->name('artist.store');
Route::delete('{id}/unfav-artist', [ArtistsController::class, 'delete'])->name('artist.delete');

