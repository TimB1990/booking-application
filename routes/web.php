<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AccommodationController;

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

            // reservations routes
            Route::get('/reservations', [ReservationController::class, 'index']);
            Route::get('/reservations/create', [ReservationController::class, 'create']);

            Route::get('/guests', [GuestController::class, 'index']);

            Route::get('/invoices', [InvoiceController::class, 'index']);

            Route::get('/assets', [AssetController::class, 'index']);

            Route::get('/issues', [IssueController::class, 'index']);

            Route::get('/services', [ServiceController::class, 'index']);
        });
    });
});
