<?php

use App\Http\Controllers\apartment_ownercontroller;
use App\Http\Controllers\apartmentcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\bookcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('/user')->controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
Route::prefix('/apartment_owner')->controller(apartment_ownercontroller::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
Route::middleware(['auth:sanctum','type.owner'])->prefix('/apartment')->controller(apartmentcontroller::class)->group(function () {
    Route::post('/create', 'create');
    Route::post('/update/{id}', 'update');
    Route::post('/delete/{id}', 'delete');
    Route::get('/alldata', 'index');
  
});
Route::middleware(['auth:sanctum','type.user'])->prefix('/booking')->controller(bookcontroller::class)->group(function () {
    Route::post('/create/{apartment}', 'create');
  
    Route::get('', 'index');
});