<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show Login Form
    public function login()
    {
        return view('layout.login-user.login');
    }
    // Auth a user into app
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Using Auth Facade to check user credentials // Success
        if (Auth::attempt($credentials)) {
            // regenerate session
            $request->session()->regenerate();

            // redirect user 
            return redirect()->route('home')
                ->with('message', 'User login successfully!')
                ->with('type', 'success');
        } else {
            // redirect user // Error
            return redirect()->back()->with('message', 'something was wrong!')
                ->with('type', 'error');
        }
    }
}
