<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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




Route::get('/list-user', function () {
    return view('screens.backend.user.list-user');
});
Route::get('', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    Route::prefix('subject')->name('subject.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\SubjectController::class, 'delete'])->name('delete');
    });

    Route::prefix('package')->name('package.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\PackageController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\PackageController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'update'])->name('update');
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

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('index');
        Route::get('change-status/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'change_status'])->name('change_status');
    });

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('change-status/{id}', [\App\Http\Controllers\Admin\PostController::class, 'change_status'])->name('change_status');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\PostController::class, 'delete'])->name('delete');
        Route::get('create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\PostController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('update');
    });

    Route::prefix('schedule')->name('schedule.')->group(function () {
        Route::get('list/{id}', [\App\Http\Controllers\Admin\ScheduleController::class, 'show'])->name('list');
    });

    Route::prefix('time')->name('time.')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\TimeController::class, 'index'])->name('list');
        Route::get('create', [\App\Http\Controllers\Admin\TimeController::class, 'create'])->name('create');
        Route::post('create', [\App\Http\Controllers\Admin\TimeController::class, 'store'])->name('store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\TimeController::class, 'edit'])->name('edit');
        Route::patch('edit/{id}', [\App\Http\Controllers\Admin\TimeController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\Admin\TimeController::class, 'delete'])->name('delete');
    });
});
