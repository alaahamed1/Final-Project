<?php

use App\Http\Controllers\dashboard\CategoryController;
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
                    Route::resource('categories', CategoryController::class);
                });
            });


    });
