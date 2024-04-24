<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteController;
use App\Models\WebsiteBacklinkRate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Authentication routes
//Auth::routes();


Route::group(['prefix' => 'websites'], function () {
    //BASIC ROUTES
    Route::get('/', [WebsiteController::class, 'index'])->name('websites.index');
    Route::get('/{id}/show', [WebsiteController::class, 'show'])->name('websites.show');
    Route::get('/create', [WebsiteController::class, 'create'])->name('websites.create');
    Route::post('/store', [WebsiteController::class, 'store'])->name('websites.store');
    Route::get('/{id}/edit', [WebsiteController::class, 'edit'])->name('websites.edit');
    Route::put('/{id}/update', [WebsiteController::class, 'update'])->name('websites.update');
    Route::delete('/{id}/destroy', [WebsiteController::class, 'destroy'])->name('websites.destroy');

    //UserWise Functions
    Route::get('/all-listings',  [WebsiteController::class, 'allListings'])->name('websites.all_listing');
    Route::get('/my-listings',  [WebsiteController::class, 'myListings'])->name('websites.my_listing');
});

Route::group(['prefix' => 'orders', 'name' => 'orders.'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/view-orders-as-seller', [OrderController::class, 'viewOrdersAsSeller'])->name('orders.view_orders_as_seller');

    //Route::get('/create', [OrderController::class, 'create'])->name('orders.create');


    // Route::get('/{id}/add_to_cart/{website_id}/{rate_id}', [OrderController::class, 'add_to_cart'])->name('orders.add_to_cart');
    Route::get('/{id}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/{id}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('/provide-details/{website_id}/{rate_id}', [OrderController::class, 'provideDetailsToOrderBacklink'])->name('orders.provide_details');
    Route::post('/store/{rate_id}', [OrderController::class, 'store'])->name('orders.store');


    Route::get('/update-order-status/{status}', [OrderController::class, 'updateOrderStatus'])->name('orders.update_order_status');
});


Route::get('/fetch-website-backlink-rates/{website_id}', [WebsiteController::class, 'getBacklinkRateByWebsiteId'])->name('website_backlink_rates');

// routes/web.php

Route::get('/splash', function () {
    return view('splash');
})->name('splash');
