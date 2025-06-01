<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin-page', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    // Category Management
    Route::controller(CategoryController::class)->name('category.')->prefix('category')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('category/delete/{id}', 'delete')->name('delete');
    });
    // Subcategory Management
    Route::controller(SubCategoryController::class)->name('subcategory.')->prefix('subcategory')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('subcategory/delete/{id}', 'delete')->name('delete');
    });
    // Unit Management
    Route::controller(UnitController::class)->name('unit.')->prefix('unit')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('unit/delete/{id}', 'delete')->name('delete');
    });
    // Brand Management
    Route::controller(BrandController::class)->name('brand.')->prefix('brand')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::post('store/{id?}', 'store')->name('store');
        Route::get('brand/delete/{id}', 'delete')->name('delete');
    });
});
