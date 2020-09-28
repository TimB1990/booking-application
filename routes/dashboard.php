<?php

use Illuminate\Support\Facades\Route;

Route::get('{accomodation}/dashboard', function($accommodation){
    return response()->view('layouts.dashboard', $accommodation, 200);
});