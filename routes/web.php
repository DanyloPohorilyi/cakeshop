<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TasteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ConfectioneryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Models\Discount;
use App\Models\OrderStatus;

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
Route::get('/', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);
Route::get('/contact', [MainController::class, 'contact']);
Route::get('/login', [MainController::class, 'login']);
Route::get('/registration', [MainController::class, 'registration']);
Route::post('/check', [MainController::class, 'checkLogin']);
Route::post('/addCustomer', [MainController::class, 'checkRegistration']);
Route::get('/shop/{category?}', [ShopController::class, 'index']);
Route::get('/shop/{category}/{product_id}', [ShopController::class, 'show']);
Route::post('/shop/{category}/{product_id}', [ShopController::class, 'store']);
Route::prefix('admin')->group(function ()
{
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('orderstatuses', OrderStatusController::class);
    Route::resource('discount', DiscountController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('confectionery', ConfectioneryController::class);
    Route::resource('taste', TasteController::class);
    Route::resource('customer', CustomerController::class);
});

