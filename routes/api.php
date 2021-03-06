<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TaskController;
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
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('todo-list', TodoListController::class);

    Route::apiResource('todo-list.task', TaskController::class)->except('show')->shallow();

    Route::apiResource('label', LabelController::class);
});

Route::post('/register', RegisterController::class)->name('user.register');

Route::post('/login', LoginController::class)->name('user.login');
