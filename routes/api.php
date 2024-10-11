<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Auth\RegisterController; // Adjust if you have a different namespace for Auth
use App\Http\Controllers\Auth\LoginController; // Adjust if you have a different namespace for Auth

// Public routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Student routes
    Route::middleware('student')->group(function () {
        Route::get('/books', [BookController::class, 'index']);
        Route::post('/books/{book}/request', [RequestController::class, 'store']);
    });

    // Librarian routes
    Route::middleware('librarian')->group(function () {
        Route::get('/requests', [RequestController::class, 'index']);
        Route::post('/requests/{request}/approve', [RequestController::class, 'approve']);
        Route::post('/requests/{request}/deny', [RequestController::class, 'deny']);
    });
});
