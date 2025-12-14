<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDataDiri
{
    public function handle($request, Closure $next)
    {
        // 1. Pastikan user sudah login
        if (!Auth::check()) {
            // simpan halaman tujuan jika user klik paket
            if ($request->is('paket') || $request->is('pilih-paket')) {
                session(['after_login_redirect' => $request->fullUrl()]);
                return redirect()->route('login.page', ['source' => 'paket']);
            }

            // default login navbar
            return redirect()->route('login.page', ['source' => 'navbar']);
        }

        $user = Auth::user();

        // 2. Cek apakah user perlu lengkapi data diri
        if (
            $user->nik == null ||
            $user->jenis_kelamin == null ||
            $user->alamat == null ||
            $user->no_hp == null
        ) {
            // simpan tujuan setelah lengkapi data diri
            session(['after_data_diri_redirect' => $request->fullUrl()]);
            return redirect()->route('data.lengkapi')
                ->with('warning', 'Silakan lengkapi data diri terlebih dahulu.');
        }

        // 3. Middleware aman → user sudah login & data diri lengkap
        return $next($request);
    }
}
