<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Update user information
        $user->name = $validatedData['name'];
        $user->bio = $validatedData['bio'];

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete existing profile photo if it exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Store new profile photo
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $profilePhotoPath;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function resetPassword(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        // Berikan respon sukses
        return redirect()->back()->with('status', 'Password berhasil diubah!');
    }
}
