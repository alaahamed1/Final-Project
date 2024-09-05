<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'website.pages.index')->name('home');
Route::view('/about', 'website.pages.about')->name('about');
Route::view('/shop', 'website.pages.shop')->name('shop');
Route::view('/contact', 'website.pages.contact')->name('contact');
Route::view('/cart', 'website.pages.cart')->name('cart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
