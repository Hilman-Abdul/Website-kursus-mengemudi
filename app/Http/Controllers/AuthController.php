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
    | TAMPILAN LOGIN & REGISTER
    |--------------------------------------------------------------------------
    */

    public function showLogin(Request $request)
    {
        return view('frontend.index', [
            'source' => $request->query('source') // paket / navbar / dll
        ]);
    }

    public function showRegister()
    {
        return view('frontend.index'); // sama-sama 1 file
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'username'  => 'required|unique:users',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6|confirmed',
        ]);

        User::create([
            'nama'      => $request->nama,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),

            // data diri kosong dulu
            'nik'           => null,
            'jenis_kelamin' => null,
            'alamat'        => null,
            'no_hp'         => null,
        ]);

        return redirect()->route('login.page')
            ->with('success', 'Registrasi berhasil, silakan login!');
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
    
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }
    
        $request->session()->regenerate();
    
        $user = Auth::user();
        $source = $request->login_source; // ← PERBAIKI INI
    
        // simpan ke session untuk middleware
        session(['login_source' => $source]);
    
    
        /*
        |----------------------------------------------------------------------
        | 1. LOGIN VIA NAVBAR → LANGSUNG DASHBOARD
        |----------------------------------------------------------------------
        */
        if ($source === 'navbar') {
            return redirect()->route('frontend.dashboard')
                ->with('success', 'Login berhasil!');
        }
    
    
        /*
        |----------------------------------------------------------------------
        | 2. LOGIN VIA PAKET → WAJIB ISI DATA DIRI
        |----------------------------------------------------------------------
        */
        if ($source === 'paket') {
    
            if (
                $user->nik == null ||
                $user->jenis_kelamin == null ||
                $user->alamat == null ||
                $user->no_hp == null
            ) {
                return redirect()->route('data.lengkapi')
                    ->with('warning', 'Lengkapi data diri terlebih dahulu.');
            }
    
            return redirect()->route('frontend.jadwal');
        }
    
    
        /*
        |----------------------------------------------------------------------
        | 3. DEFAULT LOGIN (TIDAK ADA SOURCE)
        |----------------------------------------------------------------------
        */
        if (
            $user->nik == null ||
            $user->jenis_kelamin == null ||
            $user->alamat == null ||
            $user->no_hp == null
        ) {
            return redirect()->route('data.lengkapi');
        }
    
        return redirect()->route('frontend.dashboard');
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
