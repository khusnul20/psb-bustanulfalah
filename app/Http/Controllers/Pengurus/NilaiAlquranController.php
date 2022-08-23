<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\User;
use App\Models\Kelas;
use App\Models\NilaiAlquran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class NilaiAlquranController extends Controller
{
    public function nilaiAlquran(Request $request)
    {
        if ($request->has('search')) {
            $user = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $user = User::with('nilaiAlquran')->paginate(5);
        }

        $NA = NilaiAlquran::paginate(5);
        $kelas = Kelas::select('id', 'kelas', 'madrasah')->get();
        // dd($nilai1);
        return view('dashboard.pengurus.tesAlquran.nilaiAlquran', compact('user', 'kelas', 'NA'));
    }



    public function insertNilaiAlquran(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user' => 'required|unique:nilai_alquran,user_id',
            'kelancaran_membaca' => 'required|min:1|max:25',
            'makhorijul_huruf' => 'required',
            'penempatan_tajwid' => 'required',
            'hasil' => 'required',
        ]);
        NilaiAlquran::create([
            'user_id' => request('user'),
            'kelancaran_membaca' => request('kelancaran_membaca'),
            'makhorijul_huruf' => request('makhorijul_huruf'),
            'penempatan_tajwid' => request('penempatan_tajwid'),
            'hasil' => request('hasil'),
        ]);
        Alert::success('Tes Al-Quran', 'Input Nilai Tes Al-Quran Berhasil!!');
        return redirect()->route('pengurus.nilaiAlquran');
    }

    public function addNilaiAlquran($id)
    {
        $user = User::find($id);
        $user1 = User::all();
        $nilaiAlquran = NilaiAlquran::all();
        return view('dashboard.pengurus.tesAlquran.addnilai', compact('user', 'nilaiAlquran', 'user1'));
    }

    public function deleteTesA($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Data Berhasil Di Hapus!');
        return redirect()->route('admin.nilaiAlquran');
    }
}
