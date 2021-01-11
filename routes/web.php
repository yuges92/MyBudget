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
Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/test', [\App\Http\Controllers\TestController::class, 'index'])->name('test');

Route::get('/{any}', [\App\Http\Controllers\SPAController::class,'index'])->where('any', '^(?!api).*$');



