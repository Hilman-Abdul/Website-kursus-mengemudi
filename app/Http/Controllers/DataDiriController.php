<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    // Tampilkan form data diri
    public function index()
    {
        $user = Auth::user();
        return view('frontend.data_diri', compact('user'));
    }

    // Simpan / update data diri
    public function store(Request $request)
    {
        $request->validate([
            'nik'            => 'required|digits:16',
            'no_hp'          => 'required|string|max:15',
            'alamat'         => 'required|string',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if (!empty($user->foto) && file_exists(public_path('uploads/foto/'.$user->foto))) {
                unlink(public_path('uploads/foto/'.$user->foto));
            }

            $namaFile = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/foto'), $namaFile);
            $user->foto = $namaFile;
        }

        // Update data diri
        $user->nik           = $request->nik;
        $user->no_hp         = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat        = $request->alamat;
        $user->save();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT SESUAI SESSION
        |--------------------------------------------------------------------------
        | Jika ada session after_login_redirect atau after_data_diri_redirect, pakai itu
        | Default → dashboard
        */
        $redirectTo = session()->pull('after_login_redirect', session()->pull('after_data_diri_redirect', route('frontend.dashboard')));

        return redirect($redirectTo)
            ->with('success', 'Data diri berhasil diperbarui!');
    }
}
