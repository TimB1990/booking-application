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

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('login/' . Auth::id() . '/accommodations/view');
        }

        return redirect()->back()->withErrors([
            'invalid_login' => 'invalid credentials!'
        ]);
    }

    public function redirect(Request $request)
    {
        // retrieve accommodation domain
        $domain = $request->input('domain');

        // check if accommodation exists and is assigned to authenticated user
        $accommodations = Auth::user()->accommodations;
        foreach ($accommodations as $acc) {
            if ($domain == $acc->domain) {
                // redirect to dashboard
                return redirect()->route('dashboard', [
                    'domain' => $domain,
                ]);
            }
        }

        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');

        // maybe implement functionality to log out other devices as well, therefore user must provide password (see docs)
    }
}
