<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CategoryController;
use App\Models\Manufacturer;
use App\Models\Product;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/manufacturer/store', [ManufacturerController::class, 'store'])->name('manufacturer.store');
    Route::get('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('/search',  [ProductController::class, 'search'])->name('product.search');
    Route::get('/datatables',  [ProductController::class, 'datatables'])->name('product.datatables');
});

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
});

Route::prefix('analytics')->group(function () {
    Route::get('/', [OrderController::class, 'analytics'])->name('orders.analytics');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
});