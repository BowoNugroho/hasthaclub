<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\AuthController;
use Modules\Shop\Http\Controllers\DashboardController;

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

Route::prefix('/')->group(function () {
    Route::get('/', 'ShopController@index');
});

Route::prefix('/etalase')->group(function () {
    Route::get('/', 'HomeController@index');
});

Route::middleware('guest')->group(function () {
    // Route::get('/login-cs', function () {
    //     return view('shop::customer.login');
    // })->name('login-cs');
    Route::get('/login-cs', [AuthController::class, 'login'])->name('login-cs');
    Route::post('/login-cs', [AuthController::class, 'actionlogin']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
});
