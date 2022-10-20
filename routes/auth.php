<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/signup', [AuthController::class, 'signup']);
Route::post('/postSignup', [AuthController::class, 'postSignup'])->name('postSignup');

Route::get('/login', function () {
    return view('screens.frontend.auth.login');
});