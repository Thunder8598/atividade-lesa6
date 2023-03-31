<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    AuthController,
    HomeController
};

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth', 'authenticate')->name('auth');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::get('/spa', function () {
    return view('spa');
});

Route::get('/spa/{?any}', function () {
    return view('spa');
})->where('any', '.*');
