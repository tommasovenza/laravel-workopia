<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profileUpdate(Request $request)
    {
        // Validate data
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // Find Logged user
        $user = Auth::user();

        // Update User values
        DB::table('users')->where('id', $user->id)->update([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
        ]);

        // redirect
        return redirect()->route('dashboard-index')
            ->with('message', "User data updated successfully")
            ->with("type", "success");
    }
}
