<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        $user = Auth::user(); // ambil data user yang login
        return view('profile', compact('user'));
    }

    public function userCreate()
    {
        $user = Auth::user();
        return view('user_profile', compact('user'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['nullable', 'email', 'max:50', Rule::unique('users')->ignore(Auth::id())],
            'phone' => ['nullable', 'max:50'],
            'location' => ['nullable', 'max:70'],
            'about_me' => ['nullable', 'max:150'],
            'room_id' => ['nullable', 'string', 'max:100'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);

        $user = Auth::user();

        if ($request->email !== $user->email) {
            if (env('IS_DEMO') && $user->id == 1) {
                return back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
            }
        }

        // Upload photo
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/photos/' . $user->photo); // delete old photo
            }

            $photoPath = $request->file('photo')->store('public/photos');
            $attributes['photo'] = basename($photoPath);
        }

        $user->update($attributes);

        return redirect('/profile')->with('success', 'Profile updated successfully');
    }
}