<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Show Register User Form
    public function register()
    {
        return view('layout.register.register-user');
    }
}
