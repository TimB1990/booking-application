<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AccommodationController;

class AuthController extends Controller
{
    public function showLogin(){
        return view('layouts.login');
    }

    public function login(Request $request){

        // validate request
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // check if credentials are valid
        $user = User::where('username', $request->username)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            return redirect()->back()->withErrors(['error' => 'The provided credentials are incorrect']);
        }

        $token = $user->createToken($request->username)->plainTextToken;

        $response = Http::withToken($token)->get(env('APP_URL','') . '/api/accommodations?user='. $user->id);

        return $response;

        /*return redirect()->action([
            AccommodationController::class,
            'index'
        ],['user' => $user]);*/

    }
}
