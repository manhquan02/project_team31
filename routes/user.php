<?php

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
});

    

