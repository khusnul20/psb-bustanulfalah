<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function profil()
    {
        $user = User::all();
        $pengumuman = Pengumuman::all();
        $jumlah_pengumuman = Pengumuman::where('tutup', 1)->latest()->count();
        return view('dashboard.user.profil', compact('user', 'jumlah_pengumuman', 'pengumuman'));
    }

    public function editprofile($id)
    {
        $user = User::find($id);
        return view('dashboard.user.editprofil', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->tempatLahir = $request->input('tempatLahir');
        $user->tanggalLahir = $request->input('tanggalLahir');
        $user->email = $request->input('email');

        if ($request->hasFile('image')) {
            $destinasi = 'upload/image/' . $user->image;
            if (File::exists($destinasi)) {
                File::delete($destinasi);
            }

            $file = $request->file('image');
            $extensi = $file->getClientOriginalExtension();
            $namafile = time() . '.' . $extensi;
            $file->move('upload/image/', $namafile);
            $user->image = $namafile;
        }

        $user->update([
            'name' => request('name'),
            'tempatLahir' => request('tempatLahir'),
            'tanggalLahir' => request('tanggalLahir'),
            'email' => request('email'),
        ]);
        // dd($user);
        Alert::success('Data Berhasil Di Update!');
        return redirect()->route('user.profil');
    }
}
