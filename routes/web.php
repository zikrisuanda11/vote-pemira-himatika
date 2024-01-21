<?php

use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/login', [GoogleLoginController::class, 'loginPage'])->name('login.page');

Route::get('/', [VoteController::class, 'index'])->name('vote');
Route::get('/statistics', [StatisticController::class, 'index'])->name('statistic');

Route::get('/auth/google', [GoogleLoginController::class, 'redirectToProvider'])->name('login');
Route::get('/auth/redirect', [GoogleLoginController::class, 'callback'])->name('google.callback');

Route::middleware('auth')->group(function() {
    Route::post('/logout', [GoogleLoginController::class, 'logout'])->name('logout');
    Route::post('/vote', [VoteController::class, 'vote'])->name('vote.post');
});