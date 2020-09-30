<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {

    Route::get('login/{user_id}/accommodations/view', [
        AccommodationController::class,
        'indexByAuth'
    ])->name('user_accs');

    Route::post('login/redirect', [AuthController::class, 'redirect']);

    Route::get('{domain}/dashboard', [AccommodationController::class, 'showByDomain'])->name('dashboard');
});
