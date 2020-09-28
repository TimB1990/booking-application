<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('accommodations/{user}', [AccommodationController::class, 'index']);

Route::get('accommodations/login', [AccommodationController::class, 'listAfterLogin']);
Route::get('accommodations/{id}/login', [AccommodationController::class, 'retrieveAfterLogin']);



