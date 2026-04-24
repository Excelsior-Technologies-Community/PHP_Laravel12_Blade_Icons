<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);

Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

Route::get('/favorite/{id}', [TaskController::class, 'favorite']);

Route::get('/trash', [TaskController::class, 'trash']);
Route::get('/restore/{id}', [TaskController::class, 'restore']);
Route::get('/force-delete/{id}', [TaskController::class, 'forceDelete']);

Route::get('/icons-demo', function () {
    return view('icons-demo');
});
