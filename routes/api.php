<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('registration', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('profile', [UserController::class, 'profile']);
