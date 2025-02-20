<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function profileUpdate(Request $request)
    {
        // Validate data
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // dd($validated_data['avatar']);

        // if exists avatar delete old path
        if (isset($validated_data['avatar'])) {
            // delete old file from public folder
            Storage::disk('public')->delete(auth()->user()->avatar);
            // Get file
            $file = $request->avatar;
            // Store new File into avatar folder
            $path = $file->store('avatars', 'public');

            // Find Logged user
            $user = Auth::user();

            // Update User values
            DB::table('users')->where('id', $user->id)->update([
                'name' => $validated_data['name'],
                'email' => $validated_data['email'],
                'avatar' => $path,
            ]);
        } else {
            // Find Logged user
            $user = Auth::user();

            // Update User values
            DB::table('users')->where('id', $user->id)->update([
                'name' => $validated_data['name'],
                'email' => $validated_data['email'],
            ]);
        }



        // redirect
        return redirect()->route('dashboard-index')
            ->with('message', "User data updated successfully")
            ->with("type", "success");
    }
}
