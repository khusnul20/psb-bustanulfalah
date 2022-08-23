<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProfiAdminController extends Controller
{
    public function profil()
    {
        $admin = Admin::all();
        return view('dashboard.admin.profil.index', compact('admin'));
    }

    public function updateprofileAdmin(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->hasFile('image')) {
            $destinasi = 'upload/admin/' . $admin->image;
            if (File::exists($destinasi)) {
                File::delete($destinasi);
            }

            $file = $request->file('image');
            $extensi = $file->getClientOriginalExtension();
            $namafile = time() . '.' . $extensi;
            $file->move('upload/admin/', $namafile);
            $admin->image = $namafile;
        }

        $admin->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);
        // dd($user);
        Alert::success('Data Berhasil Di Update!');
        return redirect()->route('admin.profil');
    }
}
