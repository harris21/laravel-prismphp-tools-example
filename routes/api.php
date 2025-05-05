<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('todos', [\App\Http\Controllers\TodosApiController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name('todos.index');

Route::post('todos', [\App\Http\Controllers\TodosApiController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name('todos.store');

Route::put('todos/{todo}', [\App\Http\Controllers\TodosApiController::class, 'update'])
    ->middleware('auth:sanctum')
    ->name('todos.update');
