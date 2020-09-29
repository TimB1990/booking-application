<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AccommodationController;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.login-user');
    }

    public function login(Request $request)
    {

        // validate request
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only('username, password');
    }

}
