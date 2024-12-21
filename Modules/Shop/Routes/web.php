<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\CustomerAuthController;
use Modules\Shop\Http\Controllers\DashboardController;
use Modules\Shop\Http\Controllers\RiwayatController;
use Modules\Shop\Http\Controllers\KatalogController;
use Modules\Shop\Http\Controllers\DetailKatalogController;
use Modules\Shop\Http\Controllers\StoreController;
use Modules\Shop\Http\Controllers\InformasiController;
use Modules\Shop\Http\Controllers\ShopController;
use Modules\Shop\Http\Controllers\CartController;
use Modules\Shop\Http\Controllers\CheckoutController;

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
    });
    // });
});

// Route::prefix('/')->group(function () {
//     Route::get('/', 'ShopController@index');
// });
Route::prefix('shop')->group(function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::get('/loginCs', 'loginCs')->name('customer.loginCs');
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
        Route::post('/updateCs/{id}', 'update')->name('updateCs')->middleware('auth:customer');
    });

    Route::controller(RiwayatController::class)->group(function () {
        Route::get('/riwayatCs', 'index')->name('riwayatCs')->middleware('auth:customer');
        Route::get('/invoicePdf/{id}', 'invoicePdf')->name('riwayatCs.invoicePdf')->middleware('auth:customer');
    });

    Route::prefix('product')->group(function () {
        Route::controller(KatalogController::class)->group(function () {
            Route::get('/katalog', 'index')->name('katalog');
        });

        Route::controller(DetailKatalogController::class)->group(function () {
            Route::get('/detailKatalog', 'index')->name('detail.katalog');
            Route::get('/detailProduct/{id}', 'detailKatalog')->name('detail.katalog.product');
            Route::get('/cekProduct', 'cekProduct')->name('detail.katalog.cekProduct');
            Route::get('/cekVoucher', 'cekVoucher')->name('detail.katalog.cekVoucher');
            Route::post('/addCart', 'addCart')->name('detail.katalog.addCart')->middleware('auth:customer');
            Route::get('/counCart', 'counCart')->name('detail.katalog.counCart');
        });
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart')->middleware('auth:customer');
        Route::delete('/deleteCart/{id}', 'deleteCart')->name('cart.deleteCart')->middleware('auth:customer');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout/{id}', 'index')->name('checkout')->middleware('auth:customer');
        Route::get('/dataAkun', 'cekAkun')->name('checkout.dataAkun')->middleware('auth:customer');
        Route::post('/payment', 'payment')->name('checkout.payment')->middleware('auth:customer');
        Route::get('/paymentRek', 'paymentRek')->name('checkout.paymentRek')->middleware('auth:customer');
        Route::get('/konfirmasiPayment', 'konfirmasiPayment')->name('checkout.konfirmasiPayment')->middleware('auth:customer');
        Route::post('/uploadBukti', 'uploadBukti')->name('checkout.uploadBukti')->middleware('auth:customer');
    });

    Route::controller(StoreController::class)->group(function () {
        Route::get('/store', 'index')->name('store');
        Route::post('/store/{id}', 'updateStore')->name('store.updateStore')->middleware('auth:customer');
        Route::get('/store/loadMoreStore', 'loadMoreStore')->name('store.loadMoreStore');
    });

    Route::controller(InformasiController::class)->group(function () {
        Route::get('/informasi-partnership', 'partnership')->name('informasi.partnership');
        Route::get('/informasi-reseller', 'reseller')->name('informasi.reseller');
        Route::get('/informasi-layanan', 'layanan')->name('informasi.layanan');
        Route::get('/informasi-tentang-hastha', 'tentang')->name('informasi.tentang');
        Route::get('/informasi-term-condition', 'syarat')->name('informasi.syarat');
        Route::get('/informasi-return-exchange', 'return')->name('informasi.return');
        Route::get('/informasi-karir', 'karir')->name('informasi.karir');
        Route::get('/informasi-hastha-digital', 'digital')->name('informasi.digital');
    });
});
