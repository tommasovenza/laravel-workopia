<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show Login Form
    public function login()
    {
        return view('layout.login-user.login');
    }
}
