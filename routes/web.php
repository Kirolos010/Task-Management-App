<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route for tasks 
Route::middleware('auth')->group(function () {
    Route::resource('tasks',TaskController::class);
});
require __DIR__.'/auth.php';
