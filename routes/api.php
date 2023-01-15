<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* API Routes */

Route::get('/', function () {
    return 'Frot End';
});

Route::get('get_all_projects', [ProjectController::class, 'get_all_projects']);