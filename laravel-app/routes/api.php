<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
// API Routes


Route::post ('/signup',[AuthController::class,'signup']);
Route::post ('/signin',[AuthController::class,'signin']);
Route::post ('/signout',[AuthController::class,'signout'])->middleware('auth:sanctum');
//we created a middleware for this route to check if the user is authenticated or not. If the user is not authenticated, it will return a 401 error. If the user is authenticated, it will call the signout method in the AuthController.
Route::get('/verify', [AuthController::class, 'verify'])->middleware('auth:sanctum');
//we created a middleware for this route to check if the user is authenticated or not. If the user is not authenticated, it will return a 401 error. If the user is authenticated, it will call the verifyToken method in the AuthController.

