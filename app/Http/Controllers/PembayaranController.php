<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bukti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Polyfill\Intl\Idn\Idn;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{


    public function pembayaran(Request $request) //Admin
    {
        $user = User::with('bukti')->paginate(5);
        $bukti = Bukti::all();
        return view('dashboard.admin.pembayaran.pembayaran', compact('user', 'bukti'));
    }

    public function showBuktitf($id)
    {
        $pembayaran = Bukti::find($id);
        // dd($pembayaran);
        return view('dashboard.admin.pembayaran.showBuktitf', compact('pembayaran'));
    }


    public function status($id)
    {
        $data = DB::table('bukti')->where('id', $id)->first();
        $status_sekarang = $data->status;

        if ($status_sekarang == 1) {
            DB::table('bukti')->where('id', $id)->update([
                'status' => 0
            ]);
            Alert::success('Bukti Di Non-Verifikasi');
        } else {
            DB::table('bukti')->where('id', $id)->update([
                'status' => 1
            ]);
            Alert::success('Data Berhasil di Verifikasi!');
        }
        return redirect()->route('admin.pembayaran');
    }

    public function deleteTF($id)
    {

        $bukti = Bukti::find($id);
        $bukti->delete();
        // dd($user);

        Alert::success('Data Pembayaran Berhasil Di Hapus!');
        return redirect()->route('admin.pembayaran');
    }
}
