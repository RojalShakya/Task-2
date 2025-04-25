<?php

use App\Http\Controllers\ArrayController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-weather/{city}',[WeatherController::class,'getWeather']);
Route::post('/weather',[WeatherController::class,'storeWeather']);

Route::get('/array',[ArrayController::class,'uniqueIdentify']);
