<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/list-user', function () {
    return view('screens.backend.user.list-user');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', function () {
        return view('layouts.backend.master');
    });
    Route::prefix('subject')->name('subject.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'delete'])->name('delete');
        Route::get('sort', [\App\Http\Controllers\Admin\SubjectController::class, 'sort'])->name('sort');
    });
});
