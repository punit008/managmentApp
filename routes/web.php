<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\RouteGroup;
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

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::resource('/dashboard', DashboardController::class)->only([
        'index'
    ]);

    // Logout Routes
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    // Register routes
    Route::resource('register', RegisterController::class);

    // Login Routes
    Route::resource('login', LoginController::class);
});
