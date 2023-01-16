<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/* Web Routes */

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/', function () {
        return redirect()->route('Dashboard');
    });

    // Auth Route For Admins
    Route::group(['prefix' => '/', 'namespace' => 'Auth', 'middleware' => 'guest'], function () {
        Route::view('login', 'auth.login')->name('login');
        Route::POST('post-login', [UserController::class, 'login'])->name('PostLogin');
    });
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('Dashboard');
        Route::resource('projects', ProjectController::class);
        Route::GET('porjects/search', [ProjectController::class, 'search'])->name('projectSearch');


    });
});
