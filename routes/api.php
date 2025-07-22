<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CherchController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('regions/{regionOrdinaleId}', [LocationController::class, 'getRegions']);
// Route::get('provinces/{regionId}', [LocationController::class, 'getProvinces']);
// Route::get('communes/{provinceId}', [LocationController::class, 'getCommunes']);

Route::get('search-membre', [CherchController::class, 'searchmember'])->name('searchmember');
