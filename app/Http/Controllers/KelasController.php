<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function kelas()
    {
        $kelas = Kelas::all();
        $santri = User::all();
        return view('dashboard.admin.kelas', compact('kelas', 'santri'));
    }

    public function tambahKelas()
    {
        return view('dashboard.admin.tambahKelas');
    }

    public function insertKelas(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'madrasah' => 'required|min:1|max:20',
        ]);

        Kelas::create([
            'kelas' => $request->kelas,
            'madrasah' => $request->madrasah
        ]);

        Alert::success('Data Kelas Berhasil ditambahkan!');
        return redirect()->route('admin.kelas');
    }

    public function editKelas($id)
    {

        $kelas = Kelas::find($id);
        // dd($user);
        return view('dashboard.admin.editKelas ', compact('kelas'));
    }

    public function updateKelas(Request $request, $id)
    {

        $kelas = Kelas::find($id);
        $kelas->kelas = $request->input('kelas');
        $kelas->madrasah = $request->input('madrasah');

        $kelas->update([
            'kelas' => request('kelas'),
            'madrasah' => request('madrasah'),
        ]);
        // dd($kelas);
        Alert::success('Kelas Berhasil Di Update!');
        return redirect()->route('admin.kelas');
    }

    public function konfirmasiKelas($id)
    {
        alert()->question('Peringatan!', 'Apakah anda yakin ingin menghapus kelas ini? Jika anda menghapus kelas maka data santri akan ikut terhapus')
            ->showConfirmButton('<a href="/admin/deleteKelas/' . $id . '" class="text-white text-decoration-none">Hapus</a>', '#f00000')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();
        return redirect()->route('admin.kelas');
    }

    public function deleteKelas($id)
    {

        $kelas = Kelas::find($id);
        $kelas->delete();
        // dd($kelas);

        Alert::success('Kelas Berhasil Di Hapus!');
        return redirect()->route('admin.kelas');
    }
}
