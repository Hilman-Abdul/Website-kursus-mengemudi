<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserJadwalController extends Controller
{
    // Tampilkan halaman pilih jadwal
    public function userIndex()
    {
        return view('frontend.jadwal');
    }

    // SIMPAN JADWAL USER (sesuai rute: jadwal.store)
    public function pilihJadwal(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'tanggal1'     => 'required|date',
            'jam_mulai1'   => 'required|date_format:H:i',
            'jam_selesai1' => 'required|date_format:H:i|after:jam_mulai1',

            'tanggal2'     => 'nullable|date',
            'jam_mulai2'   => 'nullable|date_format:H:i',
            'jam_selesai2' => 'nullable|date_format:H:i|after:jam_mulai2',

            'jenis_paket'  => 'required|in:manual,matic',
        ]);

        // Custom validation
        $validator->after(function ($v) use ($req) {

            if ($req->tanggal2 && ($req->tanggal2 < $req->tanggal1)) {
                $v->errors()->add('tanggal2', 'Tanggal pertemuan ke-2 tidak boleh lebih awal dari pertemuan pertama.');
            }

            if ($req->tanggal2 && (!$req->jam_mulai2 || !$req->jam_selesai2)) {
                $v->errors()->add('jam_mulai2', 'Jam pertemuan ke-2 harus lengkap.');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        Jadwal::create([
            'user_id'      => $user->id,

            'tanggal1'     => $req->tanggal1,
            'jam_mulai1'   => $req->jam_mulai1,
            'jam_selesai1' => $req->jam_selesai1,

            'tanggal2'     => $req->tanggal2,
            'jam_mulai2'   => $req->jam_mulai2,
            'jam_selesai2' => $req->jam_selesai2,

            'gender_user'  => ($user->jenis_kelamin === 'laki-laki') ? 'L' : 'P',
            'jenis_paket'  => $req->jenis_paket,
        ]);

        return redirect()
            ->route('frontend.transaksi')
            ->with('success', 'Jadwal berhasil disimpan.');
    }

    // API tanggal terbooking
    public function getBookedDates(Request $req)
    {
        $gender = $req->query('gender');        
        $jenisPaket = $req->query('jenis_paket'); 

        $query = Jadwal::query();

        if ($gender) {
            $query->where('gender_user', $gender);
        }

        if ($jenisPaket) {
            $query->where('jenis_paket', $jenisPaket);
        }

        $tanggal = $query->get(['tanggal1', 'tanggal2'])
            ->flatMap(fn($item) => [$item->tanggal1, $item->tanggal2])
            ->filter()
            ->unique()
            ->values()
            ->all();

        return response()->json($tanggal);
    }
}