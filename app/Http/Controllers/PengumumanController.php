<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController extends Controller
{
    public function pengumuman()
    {
        $p = Pengumuman::latest()->paginate(5);
        return view('dashboard.admin.pengumuman', compact('p'));
    }

    public function tambahPengumuman()
    {
        $p = Pengumuman::all();
        return view('dashboard.admin.tambahPengumuman', compact('p'));
    }

    public function insertPengumuman(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tanggal' => 'required',
            'pukul' => 'required',
            'pengumuman' => 'required',
            'deskripsi' => 'required',
        ]);

        Pengumuman::create([
            'tanggal' => $request->tanggal,
            'pukul' => $request->pukul,
            'pengumuman' => $request->pengumuman,
            'deskripsi' => $request->deskripsi,
        ]);

        Alert::success('Pengumuman Berhasil ditambahkan!');
        return redirect()->route('admin.pengumuman');
    }

    public function edit($id)
    {

        $p = Pengumuman::find($id);
        // dd($p);
        return view('dashboard.admin.editPengumuman ', compact('p'));
    }

    public function updatePengumuman(Request $request, $id)
    {

        $p = Pengumuman::find($id);
        $p->tanggal = $request->input('tanggal');
        $p->pukul = $request->input('pukul');
        $p->pengumuman = $request->input('pengumuman');
        $p->deskripsi = $request->input('deskripsi');


        $p->update([
            'tanggal' => request('tanggal'),
            'pukul' => request('pukul'),
            'pengumuman' => request('pengumuman'),
            'deskripsi' => request('deskripsi'),
        ]);
        // dd($p);
        Alert::success('Pengumuman Berhasil Update!');
        return redirect()->route('admin.pengumuman');
    }

    public function deletePengumuman($id)
    {

        $p = Pengumuman::find($id);
        $p->delete();

        Alert::success('Pengumuman Berhasil Di Hapus!');
        return redirect()->route('admin.pengumuman');
    }


    public function tutup($id)
    {
        $data = DB::table('pengumuman')->where('id', $id)->first();
        $tutup_now = $data->tutup;

        if ($tutup_now == 1) {
            DB::table('pengumuman')->where('id', $id)->update([
                'tutup' => 0
            ]);
            Alert::success('Pengumuman di Tutup!');
        } else {
            DB::table('pengumuman')->where('id', $id)->update([
                'tutup' => 1
            ]);
            Alert::success('Pengumuman di Tampi dilkan!');
        }
        return redirect()->route('admin.pengumuman');
    }
}
