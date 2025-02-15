<?php

use App\Http\Controllers\ShopAll;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::resource('products', ShopAll::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'shop.all',
        'show' => 'shop.view',
    ]);
    Route::get('/api/products', [ShopAll::class, 'getRoutes']);