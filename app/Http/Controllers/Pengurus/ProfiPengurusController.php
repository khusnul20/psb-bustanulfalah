<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProfiPengurusController extends Controller
{
    public function profilPengurus()
    {
        $pengurus = Pengurus::all();
        return view('dashboard.pengurus.profil.index', compact('pengurus'));
    }

    public function updateprofilepengurus(Request $request, $id)
    {
        $pengurus = Pengurus::find($id);
        $pengurus->name = $request->input('name');
        $pengurus->jabatan = $request->input('jabatan');
        // $pengurus->email = $request->input('jabatan');

        if ($request->hasFile('image')) {
            $destinasi = 'upload/pengurus/' . $pengurus->image;
            if (File::exists($destinasi)) {
                File::delete($destinasi);
            }

            $file = $request->file('image');
            $extensi = $file->getClientOriginalExtension();
            $namafile = time() . '.' . $extensi;
            $file->move('upload/pengurus/', $namafile);
            $pengurus->image = $namafile;
        }

        $pengurus->update([
            'name' => request('name'),
            'jabatan' => request('jabatan'),
            // 'email' => request('email'),
        ]);
        // dd($user);
        Alert::success('Data Berhasil Di Update!');
        return redirect()->route('pengurus.profilPengurus');
    }
}
