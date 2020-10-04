<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\AccommodationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
|
*/

Route::middleware('web')->group(function () {

    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::middleware('auth')->group(function () {

        // login prefix
        Route::group(['prefix' => 'login'], function () {
            
            Route::get('{user_id}/accommodations/view', [
                AccommodationController::class,
                'indexByAuth'
            ])->name('user_accs');

            Route::post('/redirect', [AuthController::class, 'redirect']);
        });

        // domain dashboard prefix
        Route::group(['prefix' => '{domain}/dashboard'], function () {

            Route::get('/', [AccommodationController::class, 'showByDomain'])->name('dashboard');

            Route::get('/residences', [ResidenceController::class, 'index']);

            Route::get('/meeting-rooms', [MeetingRoomController::class, 'index']);
        });
    });
});
