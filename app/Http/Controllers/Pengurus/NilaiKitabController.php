<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\User;
use App\Models\Kelas;
use App\Models\NilaiKitab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NilaiAlquran;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiKitabController extends Controller
{
    public function nilaiKitab(Request $request)
    {
        if ($request->has('search')) {
            $user = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $user = User::with('nilaiKitab')->paginate(5);
        }

        $nilaiKitab = NilaiKitab::all();
        $kelas = Kelas::select('id', 'kelas', 'madrasah')->get();
        // dd($nilai1);
        return view('dashboard.pengurus.tesKitab.nilaiKitab', compact('user', 'nilaiKitab', 'kelas'));
    }

    public function insertNilaiKitab(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kelancaran_membaca' => 'required',
            'user' => 'required|unique:nilai_kitab,user_id',
            'wawancara' => 'required',
            'penempatan_tajwid' => 'required',
            'hasil' => 'required',
        ]);
        NilaiKitab::create([
            'user_id' => request('user'),
            'kelancaran_membaca' => request('kelancaran_membaca'),
            'wawancara' => request('wawancara'),
            'penempatan_tajwid' => request('penempatan_tajwid'),
            'hasil' => request('hasil'),
        ]);
        Alert::success('Tes Kitab', 'Input Nilai Tes Kitab Berhasil!!');
        return redirect()->route('pengurus.nilaiKitab');
    }

    public function addNilaiKitab($id)
    {
        $user = User::find($id);
        $user1 = User::all();
        $nilaiKitab = NilaiKitab::all();
        // dd($nilaiKitab);
        return view('dashboard.pengurus.tesKitab.addnilai', compact('user', 'nilaiKitab', 'user1'));
    }

    public function deleteTesK($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Data Berhasil Di Hapus!');
        return redirect()->route('admin.nilaiKitab');
    }
}
