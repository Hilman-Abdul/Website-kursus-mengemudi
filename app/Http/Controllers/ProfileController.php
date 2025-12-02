<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('frontend.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filename = $request->file('foto')->store('foto', 'public');


            // update foto user
            $user->foto = $filename;
        }

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('frontend.dashboard')->with('success', 'Profil berhasil diperbarui!');

    }
}
