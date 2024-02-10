<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'websites'], function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('websites.index');
    Route::get('/{id}/show', [WebsiteController::class, 'show'])->name('websites.show');
    Route::get('/create', [WebsiteController::class, 'create'])->name('websites.create');
    Route::post('/store', [WebsiteController::class, 'store'])->name('websites.store');
    Route::get('/{id}/edit', [WebsiteController::class, 'edit'])->name('websites.edit');
    Route::put('/{id}/update', [WebsiteController::class, 'update'])->name('websites.update');
    Route::delete('/{id}/destroy', [WebsiteController::class, 'destroy'])->name('websites.destroy');
});

Route::group(['prefix' => 'orders', 'name' => 'orders.'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/{id}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/{id}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
});
