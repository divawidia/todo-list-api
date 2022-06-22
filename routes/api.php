<?php

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
Route::apiResource('todo-list', TodoListController::class);
//Route::get('todo-list', [TodoListController::class, 'index'])->name('todo-list.index');
//Route::get('todo-list/{id}', [TodoListController::class, 'show'])->name('todo-list.show');
//Route::post('todo-list', [TodoListController::class, 'store'])->name('todo-list.store');
//Route::patch('todo-list/{id}/update', [TodoListController::class, 'update'])->name('todo-list.update');
//Route::delete('todo-list/{id}/delete', [TodoListController::class, 'destroy'])->name('todo-list.destroy');
//
Route::get('task', [TaskController::class, 'index'])->name('task.index');
Route::post('task', [TaskController::class, 'store'])->name('task.store');
