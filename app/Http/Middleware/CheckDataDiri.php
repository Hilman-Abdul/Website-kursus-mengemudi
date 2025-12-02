<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDataDiri
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login.page');
        }

        $user = Auth::user();
        $source = session('login_source'); // navbar / paket / null

        // 1. Jika login dari navbar → abaikan cek data diri
        if ($source === 'navbar') {
            return $next($request);
        }

        // 2. Jika login dari paket → wajib cek data diri
        if ($source === 'paket') {
            if (
                $user->nik == null ||
                $user->jenis_kelamin == null ||
                $user->alamat == null ||
                $user->no_hp == null
            ) {
                return redirect()->route('data.lengkapi')
                    ->with('warning', 'Silakan lengkapi data diri terlebih dahulu.');
            }
        }

        // 3. Default → cek data diri juga
        if (
            $user->nik == null ||
            $user->jenis_kelamin == null ||
            $user->alamat == null ||
            $user->no_hp == null
        ) {
            return redirect()->route('data.lengkapi');
        }

        return $next($request);
    }
}
