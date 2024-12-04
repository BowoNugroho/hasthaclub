<?php

use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\PanelController;
use Modules\Panel\Http\Controllers\UserController;

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

Route::group(['middleware' => ['auth:web']], function () {
    // Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('panel')->group(function () {
        Route::get('/', [PanelController::class, 'index'])->name('panel.index');

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('panel.user.index');
            Route::get('/datatables', [UserController::class, 'datatables'])->name('panel.user.datatables');
        });

    });
    // });
});