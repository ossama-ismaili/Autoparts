<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

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


Route::get('/', [PageController::class, 'index']);

Route::get('/about',[PageController::class, 'about']);

Route::get('/contact',[ContactController::class, 'contact']);

Route::post('/contact/send', [ContactController::class, 'send']);

Route::get('/products/all', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/category/{id}', [ProductController::class, 'category']);

Route::get('/products/search/{keyword}', [ProductController::class, 'search']);

Route::post('/payment/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');

Route::get('/profile',[ProfileController::class, 'index']);

Route::put('/profile',[ProfileController::class, 'edit']);

Route::put('/profile/avatar',[ProfileController::class, 'edit_avatar']);

Route::get('/lang/{locale}',[LocalizationController::class,'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
