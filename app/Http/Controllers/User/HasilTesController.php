<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\NilaiKitab;
use App\Models\Pengumuman;
use App\Models\NilaiAlquran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HasilTesController extends Controller
{
    public function hasiltes(Request $request)
    {
        if ($request->has('search')) {
            $user = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(1);
            if (count($user) == 0) {
                Alert::warning('Pencarian', 'Data yang anda cari tidak ditemukan');
            }
        } else {
            $user = User::paginate(1);
        }
        $admin = Admin::all();
        $nilaiAlquran = NilaiAlquran::all();
        $nilaiKitab = NilaiKitab::all();
        $kelas = Kelas::all();
        $jumlah_pengumuman = Pengumuman::where('tutup', 1)->latest()->count();
        $pengumuman = Pengumuman::all();
        return view('dashboard.user.hasiltes', compact('user', 'nilaiAlquran', 'nilaiKitab', 'kelas', 'jumlah_pengumuman', 'pengumuman', 'admin'));
    }
}
