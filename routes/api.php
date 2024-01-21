<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VoteController;
use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\ValidationUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware(['auth', 'can:admin'])->group(function () {
//     Route::post('logout', [AuthController::class,'logout']);

// });
// Route::prefix('candidates')->group(function () {
//     Route::get('/', [CandidateController::class,'index']);
//     Route::get('/{id}', [CandidateController::class,'show']);
//     Route::post('/', [CandidateController::class,'store']);
//     Route::post('/{id}', [CandidateController::class,'update']);
//     Route::delete('/{id}', [CandidateController::class,'destroy']);
// });