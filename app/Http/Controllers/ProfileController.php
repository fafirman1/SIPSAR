<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first(); // Mengambil data profil pertama
        return view('pages.dashboard', compact('profile'));
    }

    public function editProfile()
    {
        $profile = Profile::find(1); // Assuming you fetch the profile data this way
        return view('pages.profile.edit-profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $profile = Profile::find(1); // Assuming you fetch the profile data this way

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:png|max:2048',
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|array',
            'lokasi' => 'required|string',
        ]);

        // Update the profile fields
        $profile->title = $request->title;
        $profile->logo = $request->logo;
        $profile->sejarah = $request->sejarah;
        $profile->visi = $request->visi;
        $profile->misi = json_encode($request->misi);
        $profile->lokasi = $request->lokasi;

        if ($request->hasFile('image')) {
            // Handle the image upload
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/profile/', $filename);
            $profile->image = $filename;
        }
        if ($request->hasFile('logo')) {
            // Handle the image upload
            $filename = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('public/profile/', $filename);
            $profile->logo = $filename;
        }

        $profile->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }

}

