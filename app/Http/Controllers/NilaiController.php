<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\NilaiKitab;
use App\Models\NilaiAlquran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tahunajaran;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;

class NilaiController extends Controller
{
    public function nilai(Request $request)
    {
        $keyword = $request->input('search');
        $user = User::whereHas('kelas', function ($query) use ($keyword) {
            $query->where('kelas', 'like', '%' . $keyword . '%')
                ->orWhere('name', 'like', '%' . $keyword . '%');
        })->paginate(5);

        $nilaiAlquran = NilaiAlquran::all();
        $nilaiKitab = NilaiKitab::all();
        $kelas = Kelas::all();
        return view('dashboard.admin.nilai.nilai', compact('user', 'nilaiAlquran', 'nilaiKitab', 'kelas'));
    }

    public function updateNilaiA(Request $request, $id)
    {
        $nilaiAlquran = NilaiAlquran::find($id);
        $nilaiAlquran->hasil = $request->input('hasil');

        $nilaiAlquran->update([
            'hasil' => request('hasil'),

        ]);

        Alert::success('Nilai Alquran Berhasil Di Update!');
        return redirect()->route('admin.nilai');
    }

    public function updateNilaiK(Request $request, $id)
    {
        $nilaiKitab = NilaiKitab::find($id);
        $nilaiKitab->hasil = $request->input('hasil');

        $nilaiKitab->update([
            'hasil' => request('hasil'),

        ]);


        Alert::success('Nilai Kitab Berhasil Di Update!');
        return redirect()->route('admin.nilai');
    }

    public function updateKelasNilai(Request $request, $id)
    {
        $user = User::find($id);
        $user->id_kelas = $request->input('id_kelas');

        $user->update([
            'id_kelas' => request('kelas'),

        ]);
        Alert::success('Kelas Berhasil Di Update!');
        return redirect()->route('admin.nilai');
    }



    public function deleteNilai($id)
    {
        DB::table("nilai_alquran")->where("user_id", $id)->delete();
        DB::table("nilai_kitab")->where("user_id", $id)->delete();
        Alert::success('Data Nilai Berhasil Di Hapus!');
        return redirect()->route('admin.nilai');
    }

    public function tutupNilai($id)
    {
        $data = DB::table('admins')->where('id', $id)->first();
        $tutup_now = $data->tutup;

        if ($tutup_now == 1) {
            DB::table('admins')->where('id', $id)->update([
                'tutup' => 0
            ]);
            Alert::success('Data Berhasil di Di Tutup!');
        } else {
            DB::table('admins')->where('id', $id)->update([
                'tutup' => 1
            ]);
            Alert::success('Data Berhasil di Tampilkan!');
        }
        return redirect()->route('admin.nilai');
    }
}
