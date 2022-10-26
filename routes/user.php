<?php

use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TimeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('admin/')->name('admin.')->group(function (){
    Route::prefix('user/')->name('user.')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('listUser');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/post-user', [UserController::class, 'store'])->name('postUser');
    });


    Route::prefix('discount/')->name('discount.')->group(function (){
        Route::get('/', [DiscountController::class, 'index'])->name('list');
        Route::get('/create', [DiscountController::class, 'create'])->name('create');
        Route::post('/post-discount', [DiscountController::class, 'store'])->name('postDiscount');
    });

    Route::prefix('order/')->name('order.')->group(function (){
        Route::get('/', [OrderController::class, 'index'])->name('list');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/post-order', [OrderController::class, 'store'])->name('postOrder');
    });

    Route::prefix('time/')->name('time.')->group(function (){
        Route::get('/', [TimeController::class, 'index'])->name('list');
        Route::get('/create', [TimeController::class, 'create'])->name('create');
        Route::post('/post-time', [TimeController::class, 'store'])->name('postTime');
    });

});

    

