<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyApiController;
use App\Http\Controllers\Api\BrokerApiController;

// Properties API
Route::get('/properties', [PropertyApiController::class, 'index']);
Route::get('/properties/{id}', [PropertyApiController::class, 'show']);
Route::post('/properties', [PropertyApiController::class, 'store']);
Route::put('/properties/{id}', [PropertyApiController::class, 'update']);
Route::delete('/properties/{id}', [PropertyApiController::class, 'destroy']);

// Search
Route::get('/properties/search/query', [PropertyApiController::class, 'search']);

// Brokers API
Route::get('/brokers', [BrokerApiController::class, 'index']);
Route::get('/brokers/{id}', [BrokerApiController::class, 'show']);
Route::post('/brokers', [BrokerApiController::class, 'store']);
Route::put('/brokers/{id}', [BrokerApiController::class, 'update']);
Route::delete('/brokers/{id}', [BrokerApiController::class, 'destroy']);

