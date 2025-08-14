<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::apiResource('products', ProductController::class);

Route::get('product',[ProductController::class, 'index'] );
Route::post('product',[ProductController::class, 'store'] );
Route::get('product',[ProductController::class, 'show'] );
Route::put('product/{id}',[ProductController::class, 'update'] );
Route::delete('product/{id}',[ProductController::class, 'destroy'] );