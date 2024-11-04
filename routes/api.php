<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);

Route::get('/test-api', function (){
    return "This coming from api";
});
