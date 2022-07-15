<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TurnController;
use App\Http\Controllers\Api\SectorController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MarkController;
use App\Http\Controllers\Api\StatusToolController;
use App\Http\Controllers\Api\ToolController;
use App\Http\Controllers\Api\ToolRouteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


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

Route::post('/register', [AuthController::class, 'register'])->name('register_users'); 
Route::post('/login', [AuthController::class, 'login'])->name('login_users');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout_users');

Route::post('permission/', [PermissionController::class, 'store'])->name('create_permission');
Route::post('permission/{id}', [PermissionController::class, 'update'])->name('update_permission');
Route::delete('permission/delete/{id}', [PermissionController::class, 'destroy'])->name('delete_permission');


Route::namespace('Api')->name('api.')->group(function(){

    // Route de Roles
    Route::prefix('roles')->group(function () {
        Route::group(['middleware' => ['auth:sanctum','role:Admin']], function(){
            Route::post('/', [RoleController::class, 'store'])->name('create_role');
            Route::post('/{id}', [RoleController::class, 'update'])->name('update_role');
            Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('delete_role');
        });
    });

    // Route de Permission
    Route::prefix('permissions')->group(function () {
        Route::group(['middleware' => ['auth:sanctum','role:Admin']], function(){
            Route::post('/', [PermissionController::class, 'store'])->name('create_permission');
            Route::post('/{id}', [PermissionController::class, 'update'])->name('update_permission');
            Route::delete('/delete/{id}', [PermissionController::class, 'destroy'])->name('delete_permission');
        });
    });


    Route::prefix('turns')->group(function () {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [TurnController::class, 'getList'])->name('getListTurns');
            Route::get('/{id}', [TurnController::class, 'get'])->name('getTurns');
            Route::post('/', [TurnController::class, 'store'])->name('postTurns');
            Route::post('/{id}', [TurnController::class, 'update'])->name('putTurns');
            Route::delete('/{id}', [TurnController::class, 'delete'])->name('deleteTurns');
        });
    });

    Route::prefix('sector')->group(function () {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [SectorController::class, 'getList'])->name('getListSector');
            Route::get('/{id}', [SectorController::class, 'get'])->name('getSector');
            Route::post('/', [SectorController::class, 'store'])->name('postSector');
            Route::post('/{id}', [SectorController::class, 'update'])->name('putSector');
            Route::delete('/{id}', [SectorController::class, 'delete'])->name('deleteSector');
        });
    });

    Route::prefix('office')->group(function () {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [OfficeController::class, 'getList'])->name('getListOffice');
            Route::get('/{id}', [OfficeController::class, 'get'])->name('getOffice');
            Route::post('/', [OfficeController::class, 'store'])->name('postOffice');
            Route::post('/{id}', [OfficeController::class, 'update'])->name('putOffice');
            Route::delete('/{id}', [OfficeController::class, 'delete'])->name('deleteOffice');
        });
    });

    Route::prefix('user')->group(function() {
        Route::group(['middleware' => ['auth:sanctum','role:Admin']], function(){
            Route::get('/', [UserController::class, 'getList'])->name('getListUser');
            Route::get('/{id}', [UserController::class, 'get'])->name('getUser');
            Route::post('/', [UserController::class, 'store'])->name('postUser');
            Route::post('/{id}', [UserController::class, 'update'])->name('putUser');
            Route::delete('/{id}', [UserController::class, 'delete'])->name('deleteUser');
        });
    });

    Route::prefix('mark')->group(function() {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [MarkController::class, 'getList'])->name('getListMark');
            Route::get('/{id}', [MarkController::class, 'get'])->name('getMark');
            Route::post('/', [MarkController::class, 'store'])->name('postMark');
            Route::post('/{id}', [MarkController::class, 'update'])->name('putMark');
            Route::delete('/{id}', [MarkController::class, 'delete'])->name('deleteMark');
        });
    });

    Route::prefix('models')->group(function() {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [ModelsController::class, 'getList'])->name('getListModels');
            Route::get('/{id}', [ModelsController::class, 'get'])->name('getModels');
            Route::post('/', [ModelsController::class, 'store'])->name('postModels');
            Route::post('/{id}', [ModelsController::class, 'update'])->name('putModels');
            Route::delete('/{id}', [ModelsController::class, 'delete'])->name('deleteModels');
        });
    });

    Route::prefix('statusTool')->group(function() {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [StatusToolController::class, 'getList'])->name('getListStatusTool');
            Route::get('/{id}', [StatusToolController::class, 'get'])->name('getStatusTool');
            Route::post('/', [StatusToolController::class, 'store'])->name('postStatusTool');
            Route::post('/{id}', [StatusToolController::class, 'update'])->name('putStatusTool');
            Route::delete('/{id}', [StatusToolController::class, 'delete'])->name('deleteStatusTool');
        });
    });

    Route::prefix('tool')->group(function() {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [ToolController::class, 'getList'])->name('getListTool');
            Route::get('/{id}', [ToolController::class, 'get'])->name('getTool');
            Route::post('/', [ToolController::class, 'store'])->name('postTool');
            Route::post('/{id}', [ToolController::class, 'update'])->name('putTool');
            Route::delete('/{id}', [ToolController::class, 'delete'])->name('deleteTool');
        });
    });

    Route::prefix('toolRoute')->group(function() {
        Route::group(['middleware' => ['auth:sanctum','role:Admin|User']], function(){
            Route::get('/', [ToolRouteController::class, 'getList'])->name('getListToolRoute');
            Route::get('/{id}', [ToolRouteController::class, 'get'])->name('getToolRoute');
            Route::post('/', [ToolRouteController::class, 'store'])->name('postToolRoute');
            Route::post('/{id}', [ToolRouteController::class, 'update'])->name('putToolRoute');
            Route::delete('/{id}', [ToolRouteController::class, 'delete'])->name('deleteToolRoute');
        });
    });
});
