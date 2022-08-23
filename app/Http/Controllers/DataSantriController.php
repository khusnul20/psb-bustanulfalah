<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Tahunajaran;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class DataSantriController extends Controller
{
    public function dataSantri(Request $request)
    {
        $user = DB::table('users')->get();
        $kelas = Kelas::select('id', 'kelas', 'madrasah')->get();
        $tahunAjaran = Tahunajaran::all();
        //Pencarian
        if ($request->tahunajaran && $request->kelas) {
            $user = User::where('tahunajaran_id', 'LIKE', '%' . $request->tahunajaran . '%')
                ->where('id_kelas', 'LIKE', '%' . $request->kelas . '%')->paginate(5);
        } else if ($request->name) {
            $user = User::where('name', 'LIKE', '%' . $request->name . '%')->paginate(5);
        } else if ($request->tahunajaran) {
            $user = User::where('tahunajaran_id', 'LIKE', '%' . $request->tahunajaran . '%')->paginate(5);
        } else if ($request->kelas) {
            $user = User::where('id_kelas', 'LIKE', '%' . $request->kelas . '%')->paginate(5);
        } else {
            $user = User::paginate(5);
        }

        //No Pendaftaran
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = User::count();
        $bebas = 1001;
        $urut = $bebas + $cek;
        $nomer = $thnBulan . $urut;
        return view('dashboard.admin.dataSantri', compact('user', 'kelas', 'nomer', 'tahunAjaran'));
    }



    public function insertData(Request $request) //store
    {
        // dd($request->all());
        $request->validate([
            'no_pend' => 'required',
            'nisn' => 'required',
            'name' => 'required',
            'tanggalLahir' => 'required',
            'tempatLahir' => 'required|max:20',
            'anakKe' => 'required|max:5',
            'jumlahSaudara' => 'required|max:5',
            'image' => 'required|mimes:jpg,jpeg,png',
            'foto_kk' => 'required|mimes:jpg,jpeg,png',
            'jenisKelamin' => 'required',
            'nameAyah' => 'required|max:225',
            'pekerjaanAyah' => 'required',
            'penghasilanAyah' => 'required',
            'noAyah' => 'required|max:13',
            'alamatAyah' => 'required',
            'nameIbu' => 'required|max:225',
            'pekerjaanIbu' => 'required',
            'penghasilanIbu' => 'required|max:25',
            'noIbu' => 'required|max:13',
            'alamatIbu' => 'required',
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
        ]);

        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('upload/image', $image);
        $foto_kk = time() . '.' . $request->foto_kk->getClientOriginalExtension();
        $request->foto_kk->move('upload/FotoKK', $foto_kk);

        User::create([
            'no_pend' => request('no_pend'),
            'nisn' => request('nisn'),
            'name' => request('name'),
            'tanggalLahir' => request('tanggalLahir'),
            'tempatLahir' => request('tempatLahir'),
            'anakKe' => request('anakKe'),
            'jumlahSaudara' => request('jumlahSaudara'),
            'image' => $image,
            'foto_kk' => $foto_kk,
            'jenisKelamin' => request('jenisKelamin'),
            'nameAyah' => request('nameAyah'),
            'pekerjaanAyah' => request('pekerjaanAyah'),
            'penghasilanAyah' => request('penghasilanAyah'),
            'noAyah' => request('noAyah'),
            'alamatAyah' => request('alamatAyah'),
            'nameIbu' => request('nameIbu'),
            'pekerjaanIbu' => request('pekerjaanIbu'),
            'penghasilanIbu' => request('penghasilanIbu'),
            'noIbu' => request('noIbu'),
            'alamatIbu' => request('alamatIbu'),
            'id_kelas' => request('kelas'),
            'tahunajaran_id' => request('tahun_ajaran'),
            'email' => request('email'),
            'password' => Hash::make($request->password),

        ]);

        Alert::success('Data Santri Baru Berhasil Di Ditambahkan!');
        // return view('admin.dataSantri');
        return redirect()->route('admin.dataSantri');
    }

    public function editDS($id)
    {

        $user = User::find($id);
        // dd($user);
        $kelas = Kelas::select('id', 'kelas', 'madrasah')->get();
        $tahunAjaran = Tahunajaran::all();
        return view('dashboard.admin.edit ', compact('user', 'kelas', 'tahunAjaran'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->no_pend = $request->input('no_pend');
        $user->nisn = $request->input('nisn');
        $user->name = $request->input('name');
        $user->tanggalLahir = $request->input('tanggalLahir');
        $user->tempatLahir = $request->input('tempatLahir');
        $user->anakKe = $request->input('anakKe');
        $user->jumlahSaudara = $request->input('jumlahSaudara');

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

        if ($request->hasFile('foto_kk')) {
            $destinasi = 'upload/FotoKK/' . $user->foto_kk;
            if (File::exists($destinasi)) {
                File::delete($destinasi);
            }

            $file = $request->file('foto_kk');
            $extensi = $file->getClientOriginalExtension();
            $namafile = time() . '.' . $extensi;
            $file->move('upload/FotoKK/', $namafile);
            $user->foto_kk = $namafile;
        }

        $user->jenisKelamin = $request->input('jenisKelamin');
        $user->nameAyah = $request->input('nameAyah');
        $user->pekerjaanAyah = $request->input('pekerjaanAyah');
        $user->penghasilanAyah = $request->input('penghasilanAyah');
        $user->noAyah = $request->input('noAyah');
        $user->alamatAyah = $request->input('alamatAyah');
        $user->nameIbu = $request->input('nameIbu');
        $user->pekerjaanIbu = $request->input('pekerjaanIbu');
        $user->penghasilanIbu = $request->input('penghasilanIbu');
        $user->noIbu = $request->input('noIbu');
        $user->alamatIbu = $request->input('alamatIbu');
        $user->id_kelas = $request->input('id_kelas');
        $user->tahunajaran_id = $request->input('tahunajaran_id');
        // $user->email = $request->input('email');
        // $user->password = Hash::make($request->password);

        $user->update([
            'nisn' => request('nisn'),
            'name' => request('name'),
            'tempatLahir' => request('tempatLahir'),
            'tanggalLahir' => request('tanggalLahir'),
            'anakKe' => request('anakKe'),
            'jumlahSaudara' => request('jumlahSaudara'),
            'tahunajaran_id' => request('tahun_ajaran'),
            'id_kelas' => request('kelas'),
        ]);
        // dd($user);
        Alert::success('Data Santri Baru Berhasil Di Update!');
        return redirect()->route('admin.dataSantri');
    }


    public function deleteDS($id)
    {

        $user = User::find($id);
        $user->delete();
        // dd($user);

        Alert::success('Data Santri Baru Berhasil Di Hapus!');
        return redirect()->route('admin.dataSantri');
    }

    public function cetakDS()
    {
        $data = User::all();
        view()->share('data', $data);
        $pdf = FacadePdf::loadView('dashboard.admin.downloadPDF', compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
