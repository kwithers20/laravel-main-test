<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(SaleController::class)->prefix('sales')->group(function () {
        Route::get('/', 'index')->name('coffee.sales');
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/', 'index')->name('coffee.products');
        Route::post('/', 'store')->name('coffee.products.store');
    });

    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('/', 'index')->name('coffee.customers');
        Route::post('/', 'store')->name('coffee.customers.store');
    });

    // Route::get('/shipping-partners', function () {
    //     return view('shipping_partners');
    // })->name('shipping.partners');
});

require __DIR__.'/auth.php';
