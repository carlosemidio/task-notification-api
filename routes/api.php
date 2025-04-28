<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', function (Request $request) {
    return \App\Models\Task::orderBy('scheduled_to', 'asc')->get();
});
