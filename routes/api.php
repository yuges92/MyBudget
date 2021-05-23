<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DebtsController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\IconsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users', function () {
    return response()->json(request()->all(), 201);
});

Route::get('icons', IconsController::class);

Route::resource('categories', CategoryController::class);
Route::resource('debts', DebtsController::class);
Route::resource('expenses', ExpenseController::class);
