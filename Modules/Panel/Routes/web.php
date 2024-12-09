<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\PanelController;
use Modules\Panel\Http\Controllers\UserController;
use Modules\Panel\Http\Controllers\StoreController;
use Modules\Panel\Http\Controllers\RoleController;
use Modules\Panel\Http\Controllers\HasRoleController;
use Modules\Panel\Http\Controllers\CategoryController;

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
    });
    // });
});
