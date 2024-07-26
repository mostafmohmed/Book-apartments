<?php

use App\Http\Controllers\apartmentcontroller;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
Route::prefix('/apartment')->controller(apartmentcontroller::class)->group(function () {
    Route::post('/create', 'create');
    Route::post('/update/{id}', 'update');
    Route::post('/delete/{id}', 'delete');
  
});