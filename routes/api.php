<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\adim\DashboardController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\front\ContactController;


Route::post('authenticate', [AuthenticationController::class, 'authenticate']);
Route::post('contact-now', [ContactController::class, 'index']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('logout', [AuthenticationController::class, 'logout']);

    // Services routes
    // Route::get('services', [ServiceController::class, 'index']);
    // Route::post('services', [ServiceController::class, 'store']);
    
});


