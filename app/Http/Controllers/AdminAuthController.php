<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function showLogin()
    {
        return view('frontend.index2');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Cari admin berdasarkan USERNAME dan EMAIL sekaligus
        $admin = Admin::where('username', $request->username)
                      ->where('email', $request->email)
                      ->first();

        // COCOKKAN password tanpa hash
        if ($admin && $request->password === $admin->password) {

            session(['admin_id' => $admin->id]);

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Username, email atau password salah']);
    }

    /**
     * Logout admin
     */
    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login.page');
    }
}
