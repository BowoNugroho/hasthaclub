<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\CustomerAuthController;
use Modules\Shop\Http\Controllers\DashboardController;
use Modules\Shop\Http\Controllers\RiwayatController;
use Modules\Shop\Http\Controllers\ShopController;

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

Route::group(['middleware' => ['auth:customer']], function () {
    // Route::group(['middleware' => ['role:shop']], function () {
    Route::prefix('shop')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/loginCs', [CustomerAuthController::class, 'loginCs'])->name('loginCs');
    });
    // });
});

// Route::prefix('/')->group(function () {
//     Route::get('/', 'ShopController@index');
// });

Route::controller(CustomerAuthController::class)->group(function () {
    Route::get('/loginCs', 'loginCs')->name('loginCs');
    Route::get('/registerCs', 'registerCs')->name('registerCs');
    Route::post('/loginCs', 'actionlogin')->name('actionlogin');
    Route::post('/createCs', 'store')->name('createCs');
    Route::post('/logoutCs', 'logoutCs')->name('logoutCs');
    // Route::get('/loginCs', [AuthController::class, 'loginCs'])->name('loginCs');
    // Route::post('/loginCs', [AuthController::class, 'actionlogin']);
    // Route::post('/logoutCs', [AuthController::class, 'logoutCs'])->name('logoutCs');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboardCs', 'index')->name('dashboardCs')->middleware('auth:customer');
    // Route::get('/dashboardCs', [DashboardController::class, 'index'])->name('dashboardCs')->middleware('auth');
});

Route::controller(RiwayatController::class)->group(function () {
    Route::get('/riwayatCs', 'index')->name('riwayatCs')->middleware('auth:customer');
});
