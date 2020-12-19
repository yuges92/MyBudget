<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/overview', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('overview');

Route::middleware(['auth:sanctum', 'verified'])->get('/incomes', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('incomes');

Route::middleware(['auth:sanctum', 'verified'])->get('/transactions', function () {
    return Inertia\Inertia::render('Transaction/Transactions');
})->name('transactions');

Route::middleware(['auth:sanctum', 'verified'])->get('/debts', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('debts');

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index'])->name('test');

Route::get('logout', function(){
    Auth::logout();
   return redirect('login');
});
