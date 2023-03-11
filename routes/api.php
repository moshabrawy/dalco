<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/* API Routes */

Route::get('/', function () {
    return 'Frot End';
});

Route::get('get_social_links', [AboutController::class, 'get_social_links']);
Route::get('about_us', [AboutController::class, 'about_us']);


Route::get('get_all_news', [BlogController::class, 'get_all_news']);
Route::get('get_recent_news', [BlogController::class, 'get_recent_news']);
Route::get('get_all_certificates', [CertificateController::class, 'get_all_certificates']);
Route::get('get_recent_projects', [ProjectController::class, 'get_recent_projects']);
Route::get('get_all_projects', [ProjectController::class, 'get_all_projects']);
Route::get('get_all_services', [ServiceController::class, 'get_all_services']);
Route::get('get_all_testimonials', [TestimonialController::class, 'get_all_testimonials']);
Route::get('get_all_clients', [ClientController::class, 'get_all_clients']);
Route::post('contact_us', [ContactUsController::class, 'contact_us_mail']);

