<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function(){
    return view('layouts.login');
});

Route::get('/dashboard', function () {

    /*if(Auth::check()){
        return redirect()->route('dashboard')
    }
    
    return redirect()->route('login')*/

    return view('layouts.dashboard');
});

/*Route::get('home', function(){
    return view('pages.home');
});*/
