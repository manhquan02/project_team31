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
    Route::get('', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    Route::prefix('subject')->name('subject.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'delete'])->name('delete');
        Route::get('description/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'description'])->name('description');
    });

    Route::prefix('package')->name('package.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\PackageController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\PackageController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'delete'])->name('delete');
        Route::get('set-pt', [\App\Http\Controllers\Admin\PackageController::class, 'set_pt'])->name('set_pt');
        Route::get('change-status/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'change_status'])->name('change_status');
    });

    Route::prefix('language')->name('language.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\LanguageController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\LanguageController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\LanguageController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\LanguageController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\LanguageController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\LanguageController::class, 'delete'])->name('delete');
        Route::get('translate/{lang}', [\App\Http\Controllers\Admin\LanguageController::class, 'translate'])->name('translate');
        Route::post('translate/{lang}', [\App\Http\Controllers\Admin\LanguageController::class, 'store_translate'])->name('store_translate');
        Route::get('delete_translation{translation}', [\App\Http\Controllers\Admin\LanguageController::class, 'delete_translation'])->name('delete_translation');
    });
});
