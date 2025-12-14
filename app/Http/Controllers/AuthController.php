<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPILAN LOGIN
    |--------------------------------------------------------------------------
    | source:
    | - 'navbar' → login dari icon user
    | - 'paket'  → login karena klik paket
    */
    public function showLogin(Request $request)
    {
        return view('frontend.index', [
            'source' => $request->query('source')
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */
     public function register(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ], [
        'password.confirmed' => 'Password dan konfirmasi password tidak sama',
        'password.min' => 'Password minimal 8 karakter',
    ]);

    User::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil');
}


    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // cek login
        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        $request->session()->regenerate();

        $user   = Auth::user();
        $source = $request->login_source; // navbar | paket

        // simpan sementara jika butuh di middleware
        session(['login_source' => $source]);


        /*
        |--------------------------------------------------------------------------
        | CEK DATA DIRI
        |--------------------------------------------------------------------------
        | Jika data diri belum lengkap → arahkan ke halaman data diri
        |--------------------------------------------------------------------------
        */
        if ($this->userNeedsDataDiri($user)) {
            return redirect()->route('data.lengkapi');
        }


        /*
        |--------------------------------------------------------------------------
        | SETELAH LOGIN + DATA DIRI LENGKAP
        | semua alur (navbar/paket) masuk dashboard
        |--------------------------------------------------------------------------
        */
        return redirect()->route('frontend.dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | FUNGSI CEK DATA DIRI
    |--------------------------------------------------------------------------
    */
    private function userNeedsDataDiri($user)
    {
        return (
            empty($user->nik) ||
            empty($user->jenis_kelamin) ||
            empty($user->alamat) ||
            empty($user->no_hp)
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page');
    }
}
