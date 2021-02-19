<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/players', [\App\Http\Controllers\PlayerController::class, 'index']);
Route::get('/players/{id}', [\App\Http\Controllers\PlayerController::class, 'show']);
Route::post('/players', [\App\Http\Controllers\PlayerController::class, 'store']);
Route::post('/players/{id}/answers', [\App\Http\Controllers\PlayerController::class,'answer']);
Route::post('/players/update/{id}', [\App\Http\Controllers\PlayerController::class, 'update']);
Route::delete('/players/delete/{id}', [\App\Http\Controllers\PlayerController::class, 'destroy']);
Route::delete('/players/{id}/answers', [\App\Http\Controllers\PlayerController::class, 'resetAnswers']);


Route::get('/scores', [\App\Http\Controllers\scorecontroller::class, 'index']);
Route::get('/scores/{id}', [\App\Http\Controllers\scorecontroller::class, 'show']);
Route::post('/scores', [\App\Http\Controllers\scorecontroller::class, 'store']);
Route::post('/scores/update/{id}', [\App\Http\Controllers\scorecontroller::class, 'update']);
Route::delete('/scores/delete/{id}', [\App\Http\Controllers\scorecontroller::class, 'delete']);

Route::get('/games', [\App\Http\Controllers\GameController::class, 'index']);
Route::post('/games', [\App\Http\Controllers\GameController::class, 'store']);
Route::delete('/games/delete/{id}', [\App\Http\Controllers\GameController::class, 'delete']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
