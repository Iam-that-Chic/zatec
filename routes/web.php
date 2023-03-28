<?php

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

Route::get('home', [LastfmController::class, 'index'])->name('home');
Route::post('/search', [LastfmController::class, 'search'])->name('search');
