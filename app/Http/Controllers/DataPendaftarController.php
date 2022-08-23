<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Tahunajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DataPendaftarController extends Controller
{
    public function dataPendaftar()
    {
        $user = User::paginate(5);
        $p = Pengumuman::all();
        $tahunAjaran = Tahunajaran::select('id', 'tahun_ajaran')->get();
        return view('dashboard.admin.dataPendaftar', compact('user', 'p', 'tahunAjaran'));
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        // dd($user);

        Alert::success('Data Santri Berhasil Di Hapus!');
        return redirect()->route('admin.dataPendaftar');
    }

    public function statusCS($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        $status_now = $data->status;

        if ($status_now == 1) {
            DB::table('users')->where('id', $id)->update([
                'status' => 0
            ]);
            Alert::success('Data Berhasil di Non-Verifikasi!');
        } else {
            DB::table('users')->where('id', $id)->update([
                'status' => 1
            ]);
            Alert::success('Data Berhasil di Verifikasi!');
        }
        return redirect()->route('admin.dataPendaftar');
    }
}
