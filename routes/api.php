<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users', function () {
    return response()->json(request()->all(), 201);
});

Route::get('icons', function () {

    $files = collect();
    $allFiles= collect(Storage::disk('public')->files('svg-icons'));
    $allFiles->filter(function ($file) use ($files) {
        if (\Illuminate\Support\Facades\File::extension($file) == "svg") {
            $files->push(Storage::url($file));
        }
    });

    return response()->json($files, 201);
});

Route::resource('categories', \App\Http\Controllers\Api\CategoryController::class);
Route::resource('debts', \App\Http\Controllers\Api\DebtsController::class);
Route::resource('expenses', \App\Http\Controllers\Api\ExpenseController::class);
