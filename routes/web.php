<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
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

Route::redirect('/', '/login');
Route::redirect('/home', '/dashboard');

Route::get('/login', [ SellerController::class, 'welcome' ])->name('login');
Route::post('/login', [ SellerController::class, 'logIn' ]);

Route::middleware([ 'auth' ])->group(function() {
    Route::get('/logout', [ SellerController::class, 'logOut' ]);

    Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('dashboard');

    Route::resource("/sellers", SellerController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/products/{product_id}/stocks', StockController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/sales', SaleController::class);
});