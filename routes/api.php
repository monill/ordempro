<?php

use App\Http\Controllers\API\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/countries', [LocationController::class, 'countries']);
Route::get('/states/{country_id}', [LocationController::class, 'states']);
Route::get('/cities/{state_id}', [LocationController::class, 'cities']);
