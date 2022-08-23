<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\User;
use App\Models\NilaiAlquran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;



class HasilTesAlquranController extends Controller
{
    public function tesAlquran(Request $request)
    {
        $nilaiAlquran = NilaiAlquran::paginate(10);
        return view('dashboard.pengurus.hasil.tesAlquran', compact('nilaiAlquran'));
    }

    public function editTesAlquran($id)
    {
        $nilaiAlquran = NilaiAlquran::find($id);
        // dd($nilaiAlquran);
        $user = User::all();
        return view('dashboard.pengurus.tesAlquran ', compact('user', 'nilaiAlquran'));
    }

    public function updateTesAlquran(Request $request, $id)
    {

        $nilaiAlquran = NilaiAlquran::find($id);
        $nilaiAlquran->kelancaran_membaca = $request->input('kelancaran_membaca');
        $nilaiAlquran->makhorijul_huruf = $request->input('makhorijul_huruf');
        $nilaiAlquran->penempatan_tajwid = $request->input('penempatan_tajwid');


        $nilaiAlquran->update([
            'kelancaran_membaca' => request('kelancaran_membaca'),
            'makhorijul_huruf' => request('makhorijul_huruf'),
            'penempatan_tajwid' => request('penempatan_tajwid'),
        ]);
        // dd($user);
        Alert::success('Data Berhasil Di Update!');
        return redirect()->route('pengurus.tesAlquran');
    }
}
