<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* API Routes */

Route::get('/', function () {
    return 'Frot End';
});

Route::get('get_all_news', [BlogController::class, 'get_all_news']);
Route::get('get_all_certificates', [CertificateController::class, 'get_all_certificates']);
Route::get('get_all_projects', [ProjectController::class, 'get_all_projects']);