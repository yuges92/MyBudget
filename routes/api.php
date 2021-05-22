<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DebtsController;
use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware('auth:sanctum')
       ->get('/user', function (Request $request) {
        return $request->user();
    });

Route::post('users', function () {
    return response()->json(request()->all(), 201);
});

Route::get('icons', function () {
    $files = collect();

    $allFiles = collect(Storage::disk('public')->files('svg-icons'));

    $allFiles->filter(function ($file) use ($files) {
        if (File::extension($file) === "svg") {
            $files->push(Storage::url($file));
        }
    });

    return response()->json($files, 201);
});

Route::resource('categories', CategoryController::class);
Route::resource('debts', DebtsController::class);
Route::resource('expenses', ExpenseController::class);
