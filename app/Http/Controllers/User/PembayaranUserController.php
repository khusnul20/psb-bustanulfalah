<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Bukti;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembayaranUserController extends Controller
{
    public function bukti() //User
    {
        $jumlah_pengumuman = Pengumuman::where('tutup', 1)->latest()->count();
        $pengumuman = Pengumuman::all();
        $user = User::all();
        $pembayaran = Bukti::select('id', 'foto', 'tanggal_tf', 'waktu_tf', 'status', 'user_id')->where('user_id', Auth::user()->id)->paginate('5');
        return view('dashboard.user.pembayaran', compact('pembayaran', 'user', 'jumlah_pengumuman', 'pengumuman'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png',
            'tanggal_tf' => 'required',
            'waktu_tf' => 'required',
        ]);

        $foto = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move('upload/bukti', $foto);

        Bukti::create([
            'foto' => $foto,
            'tanggal_tf' => request('tanggal_tf'),
            'waktu_tf' => request('waktu_tf'),
            'user_id' => Auth::user()->id,

        ]);

        return redirect()->route('user.bukti')->with('success', 'Bukti Pendaftaran Berhasil Di Upload!');
    }
}
