<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $title = 'Profile';
        return view('profile.index', compact('user', 'title'));
   
    }

    public function edit()
    {   
        
        $user = Auth::user();
        $title = 'Edit Profile';
        return view('profile.editprofile', compact('user','title'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'no_hp' => 'nullable|string|max:15',
        'alamat' => 'nullable|string|max:255',
        'agama' => 'nullable|string|max:100',
        'role' => 'nullable|string|max:50',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
        $image = $request->file('profile_picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile'), $imageName);

        // Save the new image path
        $user->foto = 'images/profile/' . $imageName;
    }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'agama' => $request->agama,
        'foto' =>$user->foto,
        
    ]);

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
}

}
