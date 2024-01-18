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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::prefix('candidates')->group(function () {
        Route::get('/', [CandidateController::class,'index']);
        Route::get('/{id}', [CandidateController::class,'show']);
    });

    Route::middleware('can:admin')->group(function () {
        Route::prefix('candidates')->group(function () {
            Route::post('/', [CandidateController::class,'store']);
            Route::post('/{id}', [CandidateController::class,'update']);
            Route::delete('/{id}', [CandidateController::class,'destroy']);
        });
        
        Route::get('/voters', [ValidationUserController::class,'index']);
        Route::put('/validate/{id_voter}', [ValidationUserController::class,'validating']);
    });

    Route::middleware('can:voter')->group(function () {
        Route::get('/vote', [VoteController::class,'index']);
        Route::post('/vote', [VoteController::class,'vote']);
    });

});