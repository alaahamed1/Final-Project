<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ContactDataController;
use App\Http\Controllers\dashboard\DashboardMainController;
use App\Http\Controllers\dashboard\SubcategoryController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // Public website routes
    Route::view('/', 'website.pages.index')->name('home');
    Route::view('/about', 'website.pages.about')->name('about');
    Route::view('/shop', 'website.pages.shop')->name('shop');
    Route::view('/cart', 'website.pages.cart')->name('cart');

    // User profile and contact routes
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [UserShopController::class, 'profile'])->name('profile');
        Route::post('/profile', [UserShopController::class, 'updateProfile'])->name('profile.update');
    });

    Route::view('/contact', 'website.pages.contact')->name('contact');
    Route::post('/contact', [UserShopController::class, 'contactForm'])->name('contact.submit')->middleware('throttle:contactForm');

    // Authenticated homepage route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home-auth');

    // Dashboard routes
    Route::middleware(['auth', 'dashboard'])->prefix('dashboard')->group(function () {

        Route::get('/', [DashboardMainController::class, 'index'])->name('dashboard');
        Route::get('/notifications', [DashboardMainController::class, 'notificatons'])->name('notifications');

        // Category management routes
        Route::resource('categories', CategoryController::class);
        Route::get('category/delete', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('category/forceDelete/{id}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

        // Subcategory management routes
        Route::resource('sub-categories', SubcategoryController::class);
        Route::get('subcategory/delete', [SubcategoryController::class, 'delete'])->name('subcategories.delete');
        Route::get('subcategory/restore/{id}', [SubcategoryController::class, 'restore'])->name('subcategories.restore');
        Route::delete('subcategory/forceDelete/{id}', [SubcategoryController::class, 'forceDelete'])->name('subcategories.forceDelete');

        Route::resource('contact-data', ContactDataController::class);
        Route::get('users/notification', [UserController::class, 'notification'])->name('users.notification');
        Route::post('users/notification', [UserController::class, 'sendNotification'])->name('users.sendNotification');

        // Uncomment these if product routes are needed in the future
        Route::resource('products', ProductController::class);
        Route::get('product/delete', [ProductController::class, 'delete'])->name('products.delete');
        Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
        Route::delete('product/forceDelete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    });

    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
});
