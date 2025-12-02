<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    public function index()
    {
        return view('frontend.data_diri');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'            => 'required|digits:16',
            'no_hp'          => 'required|string|max:15',
            'alamat'         => 'required|string',
            'jenis_kelamin'  => 'required|in:laki-laki,perempuan',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO (JIKA ADA)
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if (!empty($user->foto) && file_exists(public_path('uploads/foto/'.$user->foto))) {
                unlink(public_path('uploads/foto/'.$user->foto));
            }

            $namaFile = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/foto'), $namaFile);

            $user->foto = $namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA DIRI USER
        |--------------------------------------------------------------------------
        */
        $user->nik           = $request->nik;
        $user->no_hp         = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat        = $request->alamat;

        $user->save();

        /*
        |--------------------------------------------------------------------------
        | SELESAI → LANJUT JADWAL
        |--------------------------------------------------------------------------
        */
        return redirect()->route('jadwal.user')
            ->with('success', 'Data diri berhasil dilengkapi! Silakan pilih jadwal.');
    }
}
