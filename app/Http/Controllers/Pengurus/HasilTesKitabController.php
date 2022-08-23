<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\User;
use App\Models\NilaiKitab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;



class HasilTesKitabController extends Controller
{
    public function tesKitab(Request $request)
    {
        $nilaiKitab = NilaiKitab::paginate(10);
        return view('dashboard.pengurus.hasil.tesKitab', compact('nilaiKitab'));
    }

    public function editTesKitab($id)
    {
        $nilaiKitab = NilaiKitab::find($id);
        // dd($nilaiKitab);
        $user = User::all();
        return view('dashboard.pengurus.tesKitab ', compact('user', 'nilaiKitab'));
    }

    public function updateTesKitab(Request $request, $id)
    {

        $nilaiKitab = NilaiKitab::find($id);
        $nilaiKitab->kelancaran_membaca = $request->input('kelancaran_membaca');
        $nilaiKitab->wawancara = $request->input('wawancara');
        $nilaiKitab->penempatan_tajwid = $request->input('penempatan_tajwid');


        $nilaiKitab->update([
            'kelancaran_membaca' => request('kelancaran_membaca'),
            'wawancara' => request('wawancara'),
            'penempatan_tajwid' => request('penempatan_tajwid'),
        ]);
        // dd($user);
        Alert::success('Data Berhasil Di Update!');
        return redirect()->route('pengurus.tesKitab');
    }
}
