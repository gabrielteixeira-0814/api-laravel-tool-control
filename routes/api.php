<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TurnController;
use App\Http\Controllers\Api\SectorController;

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
        Route::post('/{id}', [TurnController::class, 'update'])->name('putTurns');
        Route::delete('/{id}', [TurnController::class, 'delete'])->name('deleteTurns');
    });

    Route::prefix('sector')->group(function () {
        Route::get('/', [SectorController::class, 'getList'])->name('getListSector');
        Route::get('/{id}', [SectorController::class, 'get'])->name('getSector');
        Route::post('/', [SectorController::class, 'store'])->name('postSector');
        Route::post('/{id}', [SectorController::class, 'update'])->name('putSector');
        Route::delete('/{id}', [SectorController::class, 'delete'])->name('deleteSector');
    });
});
