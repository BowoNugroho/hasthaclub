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

Route::group(['middleware' => ['auth']], function () {
    // Route::group(['middleware' => ['role:shop']], function () {
    Route::prefix('shop')->group(function () {
        Route::get('/', 'ShopController@index');
    });
    // });
});

// Route::prefix('/')->group(function () {
//     Route::get('/', 'ShopController@index');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('/loginCs', 'loginCs')->name('loginCs');
    Route::post('/loginCs', 'actionlogin')->name('actionlogin');
    Route::post('/logoutCs', 'logoutCs')->name('logoutCs');
    // Route::get('/loginCs', [AuthController::class, 'loginCs'])->name('loginCs');
    // Route::post('/loginCs', [AuthController::class, 'actionlogin']);
    // Route::post('/logoutCs', [AuthController::class, 'logoutCs'])->name('logoutCs');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/dashboardCs', 'index')->name('dashboardCs')->middleware('auth');
    // Route::get('/dashboardCs', [DashboardController::class, 'index'])->name('dashboardCs')->middleware('auth');
});
