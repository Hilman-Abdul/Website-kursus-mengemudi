<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LengkapiDataDiri
{
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login, lanjutkan saja (biarkan auth middleware yang handle)
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // Cek apakah user sudah mengisi data diri lengkap
        if (
            empty($user->nik) ||
            empty($user->jenis_kelamin) ||
            empty($user->alamat) ||
            empty($user->no_hp) ||
            empty($user->foto)
        ) {
            // Jika belum lengkap, arahkan ke halaman isi data diri
            return redirect('/data-diri')->with('warning', 'Silakan lengkapi data diri dulu.');
        }

        return $next($request);
    }
}
