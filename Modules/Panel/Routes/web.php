<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\PanelController;
use Modules\Panel\Http\Controllers\UserController;
use Modules\Panel\Http\Controllers\StoreController;
use Modules\Panel\Http\Controllers\RoleController;
use Modules\Panel\Http\Controllers\HasRoleController;
use Modules\Panel\Http\Controllers\CategoryController;
use Modules\Panel\Http\Controllers\BrandController;
use Modules\Panel\Http\Controllers\CapacityController;
use Modules\Panel\Http\Controllers\ColorController;
use Modules\Panel\Http\Controllers\ProductController;
use Modules\Panel\Http\Controllers\ProductVariantController;
use Modules\Panel\Http\Controllers\ProductBestController;
use Modules\Panel\Http\Controllers\ProductCheckoutController;

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
            Route::post('/saveUser', [UserController::class, 'saveUser'])->name('panel.user.saveUser');
            Route::get('/editUser', [UserController::class, 'editUser'])->name('panel.user.editUser');
            Route::post('/updateUser', [UserController::class, 'updateUser'])->name('panel.user.updateUser');
            Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('panel.user.deleteUser');
            Route::get('/checkUsername', [UserController::class, 'checkUsername'])->name('panel.user.checkUsername');
            Route::get('/checkHp', [UserController::class, 'checkHp'])->name('panel.user.checkHp');
            Route::get('/checkEmail', [UserController::class, 'checkEmail'])->name('panel.user.checkEmail');
        });

        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('panel.role.index');
            Route::get('/datatables', [RoleController::class, 'datatables'])->name('panel.role.datatables');
            Route::post('/saveRole', [RoleController::class, 'saveRole'])->name('panel.role.saveRole');
            Route::get('/editRole', [RoleController::class, 'editRole'])->name('panel.role.editRole');
            Route::post('/updateRole', [RoleController::class, 'updateRole'])->name('panel.role.updateRole');
            Route::delete('/deleteRole/{id}', [RoleController::class, 'deleteRole'])->name('panel.role.deleteRole');
        });

        Route::prefix('hasRole')->group(function () {
            Route::get('/', [HasRoleController::class, 'index'])->name('panel.hasRole.index');
            Route::get('/datatables', [HasRoleController::class, 'datatables'])->name('panel.hasRole.datatables');
            Route::post('/saveHasRole', [HasRoleController::class, 'saveHasRole'])->name('panel.hasRole.saveHasRole');
            Route::get('/editHasRole', [HasRoleController::class, 'editHasRole'])->name('panel.hasRole.editHasRole');
            Route::post('/updateHasRole', [HasRoleController::class, 'updateHasRole'])->name('panel.hasRole.updateHasRole');
        });

        Route::prefix('store')->group(function () {
            Route::get('/', [StoreController::class, 'index'])->name('panel.store.index');
            Route::get('/datatables', [StoreController::class, 'datatables'])->name('panel.store.datatables');
            Route::post('/saveStore', [StoreController::class, 'saveStore'])->name('panel.store.saveStore');
            Route::get('/editStore', [StoreController::class, 'editStore'])->name('panel.store.editStore');
            Route::post('/updateStore', [StoreController::class, 'updateStore'])->name('panel.store.updateStore');
            Route::delete('/deleteStore/{id}', [StoreController::class, 'deleteStore'])->name('panel.store.deleteStore');
            Route::get('/checkHp', [StoreController::class, 'checkHp'])->name('panel.store.checkHp');
            Route::get('/checkEmail', [StoreController::class, 'checkEmail'])->name('panel.store.checkEmail');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('panel.category.index');
            Route::get('/datatables', [CategoryController::class, 'datatables'])->name('panel.category.datatables');
            Route::post('/saveCategory', [CategoryController::class, 'saveCategory'])->name('panel.category.saveCategory');
            Route::get('/editCategory', [CategoryController::class, 'editCategory'])->name('panel.category.editCategory');
            Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('panel.category.updateCategory');
            Route::delete('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('panel.category.deleteCategory');
        });

        Route::prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('panel.brand.index');
            Route::get('/datatables', [BrandController::class, 'datatables'])->name('panel.brand.datatables');
            Route::post('/saveBrand', [BrandController::class, 'saveBrand'])->name('panel.brand.saveBrand');
            Route::get('/editBrand', [BrandController::class, 'editBrand'])->name('panel.brand.editBrand');
            Route::post('/updateBrand', [BrandController::class, 'updateBrand'])->name('panel.brand.updateBrand');
            Route::delete('/deleteBrand/{id}', [BrandController::class, 'deleteBrand'])->name('panel.brand.deleteBrand');
        });

        Route::prefix('capacity')->group(function () {
            Route::get('/', [CapacityController::class, 'index'])->name('panel.capacity.index');
            Route::get('/datatables', [CapacityController::class, 'datatables'])->name('panel.capacity.datatables');
            Route::post('/saveCapacity', [CapacityController::class, 'saveCapacity'])->name('panel.capacity.saveCapacity');
            Route::get('/editCapacity', [CapacityController::class, 'editCapacity'])->name('panel.capacity.editCapacity');
            Route::post('/updateCapacity', [CapacityController::class, 'updateCapacity'])->name('panel.capacity.updateCapacity');
            Route::delete('/deleteCapacity/{id}', [CapacityController::class, 'deleteCapacity'])->name('panel.capacity.deleteCapacity');
        });

        Route::prefix('color')->group(function () {
            Route::get('/', [ColorController::class, 'index'])->name('panel.color.index');
            Route::get('/datatables', [ColorController::class, 'datatables'])->name('panel.color.datatables');
            Route::post('/saveColor', [ColorController::class, 'saveColor'])->name('panel.color.saveColor');
            Route::get('/editColor', [ColorController::class, 'editColor'])->name('panel.color.editColor');
            Route::post('/updateColor', [ColorController::class, 'updateColor'])->name('panel.color.updateColor');
            Route::delete('/deleteColor/{id}', [ColorController::class, 'deleteColor'])->name('panel.color.deleteColor');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('panel.product.index');
            Route::get('/datatables', [ProductController::class, 'datatables'])->name('panel.product.datatables');
            Route::post('/saveProduct', [ProductController::class, 'saveProduct'])->name('panel.product.saveProduct');
            Route::get('/editProduct', [ProductController::class, 'editProduct'])->name('panel.product.editProduct');
            Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->name('panel.product.updateProduct');
            Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('panel.product.deleteProduct');
        });

        Route::prefix('productVariant')->group(function () {
            Route::get('/', [ProductVariantController::class, 'index'])->name('panel.productVariant.index');
            Route::get('/datatables', [ProductVariantController::class, 'datatables'])->name('panel.productVariant.datatables');
            Route::post('/saveProductVariant', [ProductVariantController::class, 'saveProductVariant'])->name('panel.productVariant.saveProductVariant');
            Route::get('/editProductVariant', [ProductVariantController::class, 'editProductVariant'])->name('panel.productVariant.editProductVariant');
            Route::post('/updateProductVariant', [ProductVariantController::class, 'updateProductVariant'])->name('panel.productVariant.updateProductVariant');
            Route::delete('/deleteProductVariant/{id}', [ProductVariantController::class, 'deleteProductVariant'])->name('panel.productVariant.deleteProductVariant');
        });

        Route::prefix('productBest')->group(function () {
            Route::get('/', [ProductBestController::class, 'index'])->name('panel.productBestSeller.index');
            Route::get('/datatables', [ProductBestController::class, 'datatables'])->name('panel.productBestSeller.datatables');
            Route::post('/saveProductBest', [ProductBestController::class, 'saveProductBest'])->name('panel.productBestSeller.saveProductBest');
            Route::get('/editProductBest', [ProductBestController::class, 'editProductBest'])->name('panel.productBestSeller.editProductBest');
            Route::post('/updateProductBest', [ProductBestController::class, 'updateProductBest'])->name('panel.productBestSeller.updateProductBest');
            Route::delete('/deleteProductBest/{id}', [ProductBestController::class, 'deleteProductBest'])->name('panel.productBestSeller.deleteProductBest');
        });

        Route::prefix('productCheckout')->group(function () {
            Route::get('/', [ProductCheckoutController::class, 'index'])->name('panel.productCheckout.index');
            Route::get('/datatables', [ProductCheckoutController::class, 'datatables'])->name('panel.productCheckout.datatables');
            Route::post('/saveProductCheckout', [ProductCheckoutController::class, 'saveProductCheckout'])->name('panel.productCheckout.saveProductCheckout');
            Route::get('/editProductCheckout', [ProductCheckoutController::class, 'editProductCheckout'])->name('panel.productCheckout.editProductCheckout');
            Route::post('/updateProductCheckout', [ProductCheckoutController::class, 'updateProductCheckout'])->name('panel.productCheckout.updateProductCheckout');
            Route::delete('/deleteProductCheckout/{id}', [ProductCheckoutController::class, 'deleteProductCheckout'])->name('panel.productCheckout.deleteProductCheckout');
        });
    });
    // });
});
