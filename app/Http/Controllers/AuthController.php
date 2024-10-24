<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register user
    public function register (Request $request) {
    // Validate
    $fields = $request->validate([
    'username' => ['required', 'max:255'],
    'email' => ['required', 'max:255', 'email', 'unique:users'],
    'password' => ['required','min:3', 'confirmed']
    ]);


    // Register
    $user = User::create($fields);

    // Login
    Auth::login($user);

    // Redirect
    return redirect()->route('home');
    }

    // Login User
    public function login (Request $request) {
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // try to login the user
        $attemptToLogin = Auth::attempt($fields, $request->remember);
        if($attemptToLogin) {
            return redirect()->route('home');
        }else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match'
            ]);
        }
    }
}
