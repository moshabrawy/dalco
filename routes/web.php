<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
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
        Route::get('forget-password', [UserController::class, 'forget'])->name('ForgetPassword');
    });
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('Dashboard');
        Route::resource('projects', ProjectController::class);
        Route::GET('porjects/search', [ProjectController::class, 'search'])->name('projectSearch');

        Route::resource('blogs', BlogController::class);
        Route::GET('blogs/search', [BlogController::class, 'search'])->name('blogSearch');

        Route::resource('services', ServiceController::class);
        Route::GET('services/search', [ServiceController::class, 'search'])->name('serviceSearch');

        Route::resource('testimonials', TestimonialController::class);
        Route::GET('testimonials/search', [TestimonialController::class, 'search'])->name('testimonialSearch');

        Route::resource('clients', ClientController::class);
        Route::GET('clients/search', [ClientController::class, 'search'])->name('clientSearch');

        Route::resource('certificates', CertificateController::class);
        Route::GET('certificates/search', [CertificateController::class, 'search'])->name('certificateSearch');

        Route::resource('about', AboutController::class);
    });
});
