<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TurnController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::namespace('Api')->name('api.')->group(function(){

    Route::prefix('turns')->group(function () {
        Route::get('/', [TurnController::class, 'getList'])->name('getListTurns');
        Route::get('/{id}', [TurnController::class, 'get'])->name('getTurns');
        Route::post('/', [TurnController::class, 'store'])->name('postTurns');
    });
});





Route::get('/ola', function () {
    return "Ola mundo!";
});