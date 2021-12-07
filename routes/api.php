<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskListController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'task-list'
],function($route){
    Route::get('/by-date/{ymd}',[TaskListController::class, 'byDate']);
    Route::patch('/change-status/{id}',[TaskListController::class, 'changeStatus']);
    Route::delete('/delete/{id}',[TaskListController::class,'delete']);
    Route::post('/add-new-task',[TaskListController::class,'addNewTask']);
});
