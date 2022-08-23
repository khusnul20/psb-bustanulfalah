<?php

namespace App\Http\Controllers;

use App\Models\Tahunajaran;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TahunAjaranController extends Controller
{
    public function tahunAjaran()
    {
        $tahunAjaran = Tahunajaran::all();
        $user = User::all();
        return view('dashboard.admin.tahunAjaran.index', compact('tahunAjaran', 'user'));
    }

    public function insertTA(Request $request)
    {

        $request->validate([
            'tahun_ajaran' => 'required',
        ]);

        Tahunajaran::create([
            'tahun_ajaran' => $request->input('tahun_ajaran'),
        ]);

        Alert::success('Tahun Ajaran Baru Berhasil ditambahkan!');
        return redirect()->route('admin.tahunAjaran');
    }


    public function updateTA(Request $request, $id)
    {

        $tahunAjaran = Tahunajaran::find($id);
        $tahunAjaran->tahun_ajaran = $request->input('tahun_ajaran');


        $tahunAjaran->update([
            'tahun_ajaran' => request('tahun_ajaran'),
        ]);
        // dd($p);
        Alert::success('Tahun Ajaran Berhasil Di Update!');
        return redirect()->route('admin.tahunAjaran');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan!', 'Apakah anda yakin ingin menghapus tahun ajaran ini? Jika anda menghapus tahun ajaran maka data santri akan ikut terhapus')
            ->showConfirmButton('<a href="/admin/deleteTA/' . $id . '" class="text-white text-decoration-none">Hapus</a>', '#f00000')->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();
        return redirect()->route('admin.tahunAjaran');
    }

    public function deleteTA($id)
    {

        $tahunAjaran = Tahunajaran::find($id);
        $tahunAjaran->delete();

        Alert::success('Tahun Ajaran Berhasil Di Hapus!');
        return redirect()->route('admin.tahunAjaran');
    }
}
