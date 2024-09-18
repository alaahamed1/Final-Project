<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\SubcategoryController;
use App\Http\Controllers\dashboard\DashboardMainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\custom_middleware\dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::view('/', 'website.pages.index')->name('home');
        Route::view('/about', 'website.pages.about')->name('about');
        Route::view('/shop', 'website.pages.shop')->name('shop');
        Route::view('/contact', 'website.pages.contact')->name('contact');
        Route::view('/cart', 'website.pages.cart')->name('cart');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home-auth');


        Route::group(
            [
            'middleware' => ['auth', 'dashboard']], function(){
                Route::prefix('dashboard')->group(function(){
                    Route::get('/', [DashboardMainController::class, 'index'])->middleware(dashboard::class)->name('dashboard');
                    // categories
                    Route::resource('categories', CategoryController::class);
                    Route::get('/category/delete' , [CategoryController::class , 'delete'])->name('categories.delete');
                    Route::get('/category/restore/{id}' ,[CategoryController::class , 'restore'])->name('categories.restore');
                    Route::delete('/category/forceDelete/{id}' , [CategoryController::class , 'forceDelete'])->name('categories.forceDelete');
                    // sub categories
                    Route::resource('sub-categories', SubcategoryController::class);
                    // Route::get('/subcategory/delete' , [SubcategoryController::class , 'delete'])->name('subcategories.delete');
                    // Route::get('/subcategory/restore/{id}' ,[SubcategoryController::class , 'restore'])->name('subcategories.restore');
                    // Route::delete('/subcategory/forceDelete/{id}' , [SubcategoryController::class , 'forceDelete'])->name('subcategories.forceDelete');
                    // // products
                    // Route::resource('products', ProductController::class);
                    // Route::get('/product/delete' , [ProductController::class , 'delete'])->name('products.delete');
                    // Route::get('/product/restore/{id}' ,[ProductController::class , 'restore'])->name('products.restore');
                    // Route::delete('/product/forceDelete/{id}' , [ProductController::class , 'forceDelete'])->name('products.forceDelete');

                });
            });


    });
