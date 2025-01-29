<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show Register User Form
    public function register()
    {
        return view('layout.register.register-user');
    }

    // Store a new User into Database
    public function store(Request $request)
    {
        // Validate Data
        $validated_data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|confirmed|min:6",
            "password_confirmation" => "required",
        ]);

        // Hash User Password with bcrypt
        $validated_data['password'] = Hash::make($validated_data['password']);
        // Create new User
        User::create($validated_data);
        // redirect user
        return redirect()->route('login')
            ->with('message', 'New User register successfully!')
            ->with('type', 'success');
    }
}
