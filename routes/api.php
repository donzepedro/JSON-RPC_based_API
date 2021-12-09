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
],function($route){
    Route::get('/tasks/{ymd}',[TaskListController::class, 'show'])->name('show_by_date');
    Route::patch('/tasks/{id}',[TaskListController::class, 'edit'])->name('change-status');
    Route::delete('/tasks/{id}',[TaskListController::class,'delete'])->name('delete');
    Route::post('/tasks',[TaskListController::class,'store'])->name('add-new-task');
});
